<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Dummy',
            'email' => 'test@mail.com',
            'password' => 'Password123',
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => 'Password321',
            'is_admin' => 1
        ]);

        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            LendingSeeder::class,
            ReviewSeeder::class
        ]);
    }
}
