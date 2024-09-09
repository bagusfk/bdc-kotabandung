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
            'url' => json_encode([
                'terlaris/1', 'laris/1', 'kurang_laris/1'
            ])
        ]);

        category::create([
            'category' => 'Kriya',
            'url' => json_encode([
                'terlaris/2', 'laris/2', 'kurang_laris/2'
            ])
        ]);

        category::create([
            'category' => 'Kuliner',
            'url' => json_encode([
                'terlaris/3', 'laris/3', 'kurang_laris/3'
            ])
        ]);
    }
}
