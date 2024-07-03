<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::create([
            'category' => 'Fashion',
            'url' => 'terlaris/1'
        ]);

        category::create([
            'category' => 'Kriya',
            'url' => 'terlaris/2'
        ]);

        category::create([
            'category' => 'Kuliner',
            'url' => 'terlaris/3'
        ]);
    }
}
