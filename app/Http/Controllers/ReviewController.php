<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($productId);

        if ($product->user_id == Auth::id()) {
            return redirect()->route('products.show', $productId)->with('error', 'You cannot review your own product.');
        }

        $existingReview = Review::where('product_id', $productId)
            ->where('reviewer_id', Auth::id())
            ->first();

        if ($existingReview) {
            $existingReview->update([
                'rating' => $request->input('rating'),
                'comment' => $request->input('comment'),
            ]);

            return redirect()->route('products.show', $productId)->with('success', 'Review updated successfully.');
        }

        Review::create([
            'product_id' => $productId,
            'reviewer_id' => Auth::id(),
            'reviewee_id' => $product->user_id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('products.show', $productId)->with('success', 'Review submitted successfully.');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        if ($review->reviewer_id != Auth::id()) {
            return redirect()->route('products.show', $review->product_id)->with('error', 'You are not authorized to edit this review.');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        if ($review->reviewer_id != Auth::id()) {
            return redirect()->route('products.show', $review->product_id)->with('error', 'You are not authorized to update this review.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('products.show', $review->product_id)->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if ($review->reviewer_id != Auth::id()) {
            return redirect()->route('products.show', $review->product_id)->with('error', 'You are not authorized to delete this review.');
        }

        $review->delete();

        return redirect()->route('products.show', $review->product_id)->with('success', 'Review deleted successfully.');
    }
}
