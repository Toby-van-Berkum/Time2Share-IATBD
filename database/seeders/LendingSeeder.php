<?php

namespace Database\Seeders;

use App\Models\Lending;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lending::factory()
            ->count(20)
            ->state(function (array $attributes) {
                $statuses = ['pending', 'accepted', 'returned'];
                return ['status' => $statuses[array_rand($statuses)]];
            })
            ->create();
    }
}
