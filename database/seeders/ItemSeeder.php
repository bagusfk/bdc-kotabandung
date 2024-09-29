<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Stokbarang;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('stokbarangs')->insert([
                'category_id' => $faker->numberBetween(1, 3), // asumsi category_id antara 1 sampai 3
                'kelola_data_ksm_id' => $faker->numberBetween(1, 20), // asumsi kelola_data_ksm_id antara 1 sampai 5
                'name' => $faker->word,
                'weight' => $faker->numberBetween(100, 1000), // berat antara 100 - 1000 gram
                'stock' => $faker->numberBetween(1, 100),
                'price' => $faker->numberBetween(10000, 100000), // harga antara 10.000 - 1.000.000
                'expired' => $faker->dateTimeBetween('now', '+1 year'),
                'description' => $faker->sentence,
                'sales' => $faker->numberBetween(0, 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // Stokbarang::create([
        //     'category_id' => 1,
        //     'kelola_data_ksm_id' => 12,
        //     'name' => 'Hijab 1',
        //     'weight' => 500,
        //     'stock' => 20,
        //     'price' => 12000,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        // ]);

        // Stokbarang::create([
        //     'category_id' => 1,
        //     'kelola_data_ksm_id' => 13,
        //     'name' => 'Hijab 2',
        //     'weight' => 500,
        //     'stock' => 20,
        //     'price' => 12000,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        // ]);

        // Stokbarang::create([
        //     'category_id' => 1,
        //     'kelola_data_ksm_id' => 14,
        //     'name' => 'Hijab 3',
        //     'weight' => 500,
        //     'stock' => 100,
        //     'price' => 12000,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ullam soluta dolore omnis enim expedita. Culpa vero quae dicta, distinctio totam corporis amet ab assumenda aspernatur explicabo expedita nam architecto.'
        // ]);
    }
}
