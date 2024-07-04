<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Product::factory()->count(3)->create([
                'category_id' => $category->id,
                'user_id' => User::inRandomOrder()->first()->id, // Assign to a random existing user
            ]);
        }
    }
}
