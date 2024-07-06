<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $categories = Category::all();
    
        // Start the query
        $query = Product::with('user');
    
        // Apply category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
            }
        }
    
        // Exclude products created by the current user
        $query->where('user_id', '!=', $userId);
    
        $products = $query->get();
    
        return view('products.index', compact('categories', 'products'));
    }
    

    /**
     * Display a listing of all the resources.
     */
    public function owned()
    {
        $userId = Auth::id();
        $categories = Category::all();
        $products = Product::where('user_id', $userId)->with('user')->get();
        return view('products.index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = null;
        }

        $price = number_format($request->price, 2, '.', '');

        $product = new Product([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $price,
            'image' => $imagePath
        ]);

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($productId)
    {
        $product = Product::findOrFail($productId);

        $reviews = Review::where('product_id', $productId)->get();

        // Calculate average rating
        $totalRatings = $reviews->count();
        $averageRating = $reviews->avg('rating');

        // Count ratings for each star level
        $ratingsCount = $reviews->groupBy('rating')->map->count();

        return view('products.show', compact('product', 'reviews', 'averageRating', 'totalRatings', 'ratingsCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('products.index');
    }
}
