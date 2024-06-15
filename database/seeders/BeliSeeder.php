<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beli;

class BeliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beli::create([
            'user_id' => 5,
            'product_id' => 3,
            'qty' => 1,
            'payment_method' => 'qris',
            'pay' => 12000,
            'order_process' => 'finish'
        ]);
        Beli::create([
            'user_id' => 5,
            'product_id' => 2,
            'qty' => 1,
            'payment_method' => 'qris',
            'pay' => 12000,
            'order_process' => 'finish'
        ]);
        Beli::create([
            'user_id' => 5,
            'product_id' => 2,
            'qty' => 1,
            'payment_method' => 'qris',
            'pay' => 12000,
            'order_process' => 'finish'
        ]);
        Beli::create([
            'user_id' => 5,
            'product_id' => 2,
            'qty' => 1,
            'payment_method' => 'qris',
            'pay' => 12000,
            'order_process' => 'finish'
        ]);
        Beli::create([
            'user_id' => 5,
            'product_id' => 1,
            'qty' => 1,
            'payment_method' => 'qris',
            'pay' => 12000,
            'order_process' => 'finish'
        ]);
        Beli::create([
            'user_id' => 5,
            'product_id' => 1,
            'qty' => 1,
            'payment_method' => 'qris',
            'pay' => 12000,
            'order_process' => 'finish'
        ]);
    }
}
