<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stokbarang;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Stokbarang::create([
            'category_id' => 1,
            'kelola_data_ksm_id' => 12,
            'name' => 'Hijab 1',
            'weight' => 500,
            'stock' => 20,
            'price' => 12000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Stokbarang::create([
            'category_id' => 1,
            'kelola_data_ksm_id' => 13,
            'name' => 'Hijab 2',
            'weight' => 500,
            'stock' => 20,
            'price' => 12000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Stokbarang::create([
            'category_id' => 1,
            'kelola_data_ksm_id' => 14,
            'name' => 'Hijab 3',
            'weight' => 500,
            'stock' => 100,
            'price' => 12000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);
    }
}
