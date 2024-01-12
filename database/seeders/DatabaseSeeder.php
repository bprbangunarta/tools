<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Zulfadli Rizal',
            'username' => 'zulfame',
            'email' => 'zulfadlirizal@gmail.com',
            'password' => '$2y$10$noEowp1St8Alzd/QsCGq1.GricxzOLECXllgwdjSK1dpdLvblFGM2', // 1
        ]);
    }
}
