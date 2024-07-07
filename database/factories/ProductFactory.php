<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => fake()->sentence(3),
            'price' => fake()->randomFloat(2, 10, 100),
            'description' => fake()->paragraph(2),
            'category_id' => Category::all()->random()->id,
            'image' => fake()->imageUrl(640, 480),
        ];
    }
}

