<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
            // Retrieve all users within the current category
            $users = User::inRandomOrder()->limit(3)->get(); // Example: Limit to 3 users per category

            // Create products for each user in the category
            foreach ($users as $user) {
                Product::factory()->create([
                    'category_id' => $category->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
