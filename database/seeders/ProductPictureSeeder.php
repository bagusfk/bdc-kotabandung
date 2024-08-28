<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product_pictures;

class ProductPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product_pictures::create([
            'product_id' => 1,
            'product_picture' => 'https://drive.google.com/open?id=1lf78EKIttUOCcJpgaqoUOOpFTMUDnU72',
        ]);

        Product_pictures::create([
            'product_id' => 2,
            'product_picture' => 'https://drive.google.com/open?id=10km_ehYGZVM54Uo5_gWZlyeq3G8mTsnS',
        ]);

        Product_pictures::create([
            'product_id' => 3,
            'product_picture' => 'https://drive.google.com/open?id=1GRgbbmNJ4rk9d3K9K7OveWT__lF47WmL',
        ]);
    }
}
