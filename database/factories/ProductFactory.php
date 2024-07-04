<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => fake()->sentence(3),
            'price' => fake()->randomFloat(2, 10, 100),
            'description' => fake()->paragraph(2),
            'category_id' => Category::all()->random()->id, // This assumes your category seeder runs before this one
            'image' => fake()->imageUrl(640, 480), // Optional: Generate a random image URL
        ];
    }
}
