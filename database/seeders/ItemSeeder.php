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
            'category_id' => 3,
            'ksm_id' => 3,
            'picture_product' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'name' => 'Chiki',
            'stock' => 20,
            'price' => 10000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Stokbarang::create([
            'category_id' => 3,
            'ksm_id' => 4,
            'picture_product' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'name' => 'Le Minerale',
            'stock' => 100,
            'price' => 5000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Stokbarang::create([
            'category_id' => 3,
            'ksm_id' => 4,
            'picture_product' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'name' => 'Kentang',
            'stock' => 100,
            'price' => 2000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);
    }
}
