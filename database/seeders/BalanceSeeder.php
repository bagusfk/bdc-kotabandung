<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelola_data_keuangan;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelola_data_keuangan::create([
            'date' => now(),
            'kelola_data_ksm_id' => 12,
            'omzet' => 78000
        ]);

        Kelola_data_keuangan::create([
            'date' => now(),
            'kelola_data_ksm_id' => 13,
            'omzet' => 30000
        ]);

        Kelola_data_keuangan::create([
            'date' => now(),
            'kelola_data_ksm_id' => 14,
            'omzet' => 40000
        ]);
    }
}
