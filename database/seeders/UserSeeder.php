<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
        
        User::factory()->count(4)->create();
    }
}
