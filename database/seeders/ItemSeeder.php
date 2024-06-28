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
            'picture_product' => 'https://drive.google.com/open?id=1lf78EKIttUOCcJpgaqoUOOpFTMUDnU72',
            'name' => 'Hijab 1',
            'stock' => 20,
            'price' => 10000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Stokbarang::create([
            'category_id' => 1,
            'kelola_data_ksm_id' => 12,
            'picture_product' => 'https://drive.google.com/open?id=10km_ehYGZVM54Uo5_gWZlyeq3G8mTsnS',
            'name' => 'Hijab 2',
            'stock' => 20,
            'price' => 10000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);

        Stokbarang::create([
            'category_id' => 1,
            'kelola_data_ksm_id' => 12,
            'picture_product' => 'https://drive.google.com/open?id=1GRgbbmNJ4rk9d3K9K7OveWT__lF47WmL',
            'name' => 'Hijab 3',
            'stock' => 100,
            'price' => 5000,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        ]);
    }
}
