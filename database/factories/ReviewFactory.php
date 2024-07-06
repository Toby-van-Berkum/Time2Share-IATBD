<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $reviewer = User::where('id', '!=', $product->user->id)->inRandomOrder()->first();
        while (isset($reviewer) && Review::where('product_id', $product->id)->where('reviewer_id', $reviewer->id)->exists()) {
            $reviewer = User::where('id', '!=', $product->user->id)->inRandomOrder()->first();
        }
        return [
            'product_id' => $product->id,
            'reviewer_id' => $reviewer->id,
            'reviewee_id' => $product->user->id,
            'rating' => random_int(1, 5),
            'comment'=> fake()->paragraph(1)
        ];
    }
}
