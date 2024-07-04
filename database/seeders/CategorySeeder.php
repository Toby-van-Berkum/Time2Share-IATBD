<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Clothing & Apparel',
            'Home & Garden',
            'Health & Beauty',
            'Sports & Outdoors',
            'Books & Media',
            'Automotive',
            'Toys & Games',
            'Furniture',
            'Jewelry & Accessoiries'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
