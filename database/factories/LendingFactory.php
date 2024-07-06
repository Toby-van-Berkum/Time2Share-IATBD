<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
use App\Models\Lending;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lending>
 */
class LendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $lender = $product->user;
        $borrower = User::where('id', '!=', $lender)->inRandomOrder()->first();
        $start_date = now();
        $end_date = $start_date->copy()->addDays(rand(4, 7));
        return [
            'product_id' => $product->id,
            'lender_id' => $lender->id,
            'borrower_id' => $borrower->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 'pending'
        ];
    }
}
