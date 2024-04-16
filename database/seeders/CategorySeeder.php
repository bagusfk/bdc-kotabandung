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
            'category' => 'Makanan Ringan',
        ]);

        category::create([
            'category' => 'Minuman',
        ]);

        category::create([
            'category' => 'Sayuran',
        ]);

        category::create([
            'category' => 'Daging',
        ]);

        category::create([
            'category' => 'Ikan',
        ]);
    }
}
