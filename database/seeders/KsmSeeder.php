<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelola_data_ksm;

class KsmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => '1',
            'user_id' => '3',
            'owner' => 'Sholeh',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '08123456789',
            'brand_name' => 'Kripik Jaya',
            'business_entity' => 'Toko',
            'business_description' => 'jual kripik',
            'product_sales_address' => 'Jl. Fatahillah No.90',
        ]);
        Kelola_data_ksm::create([
            'cluster' => 'c',
            'category_id' => '1',
            'user_id' => '4',
            'owner' => 'shalih',
            'owner_picture' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
            'no_wa' => '08123456789',
            'brand_name' => 'Kripik Jaya',
            'business_entity' => 'Toko',
            'business_description' => 'jual kripik',
            'product_sales_address' => 'Jl. asdasd 12',
        ]);
    }
}
