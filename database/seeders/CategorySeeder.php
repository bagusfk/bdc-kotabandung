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
        ]);

        category::create([
            'category' => 'Kriya',
        ]);

        category::create([
            'category' => 'Kuliner',
        ]);
    }
}
