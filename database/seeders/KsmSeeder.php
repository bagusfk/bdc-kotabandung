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
            'business_name' => 'Kripik Jaya',
            'owner' => 'Sholeh',
            'no_whatsapp' => '08123456789',
            'category_id' => '1',
            'address' => 'Jl. Fatahillah No.90',
        ]);

        Kelola_data_ksm::create([
            'business_name' => 'Fisher Seazone',
            'owner' => 'Joseph',
            'no_whatsapp' => '08219876541',
            'category_id' => '5',
            'address' => 'Jl. Kalijaga No.120',
        ]);
    }
}
