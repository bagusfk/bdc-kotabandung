<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'buyer_id' => '5',
            'invoice' => 'INV-1210280',
            'address' => 'Cirebon',
            'phone' => '0891263131',
            'total_qty' =>  1,
            'total_price' => 12000,
            'created_at' => now()->toDateString()
        ]);
        Transaction::create([
            'buyer_id' => '5',
            'invoice' => 'INV-1210281',
            'address' => 'Cirebon',
            'phone' => '0891263131',
            'total_qty' =>  1,
            'total_price' => 12000,
            'created_at' => now()->toDateString()
        ]);
    }
}
