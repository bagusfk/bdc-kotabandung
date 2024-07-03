<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'product_id' => 1,
            'transaction_id' => 1,
            'qty' => 1,
            'price' => 12000,
            'total_price' => 12000,
            'created_at' => now()->toDateString()
        ]);
        Order::create([
            'product_id' => 2,
            'transaction_id' => 2,
            'qty' => 6,
            'price' => 12000,
            'total_price' => 72000,
            'created_at' => now()->toDateString()
        ]);
        Order::create([
            'product_id' => 3,
            'transaction_id' => 3,
            'qty' => 5,
            'price' => 12000,
            'total_price' => 60000,
            'created_at' => now()->toDateString()
        ]);
    }
}
