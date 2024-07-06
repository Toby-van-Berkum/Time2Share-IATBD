<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Product;
use App\Models\Lending;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    /**
     * Redirect to users view.
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editUser()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Delete the user's account.
     */
    public function destroyUser(User $user)
    {
        $user->delete();

        return Redirect::route('admin.users')->with('status', 'User deleted successfully.');
    }

    /**
     * Redirect to products view.
     */
    public function products()
    {
        $products = Product::with('user')->get();
        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProduct()
    {
        $products = Product::with('user')->get();
        return view('admin.products', compact('products'));
    }

    /**
     * Redirect to lendings view.
     */
    public function lendings()
    {
        $lendings = Lending::all();
        return view('admin.lendings', compact('lendings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editLendings()
    {
        $lendings = Lending::all();
        return view('admin.lendings', compact('lendings'));
    }

    /**
     * Redirect to categories view.
     */
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCategories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Redirect to settings view.
     */
    public function settings()
    {
        return view('admin.settings');
    }

    
    /**
     * Redirect to analytics view.
     */
    public function analytics()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $activeLendingsCount = Lending::where('status', 'pending')->count();
        $acceptedLendingsCount = Lending::where('status', 'accepted')->count();
        $returnedLendingsCount = Lending::where('status', 'returned')->count();
        
        return view('admin.analytics', compact('userCount', 'productCount', 'activeLendingsCount', 'acceptedLendingsCount', 'returnedLendingsCount'));
    }
}
