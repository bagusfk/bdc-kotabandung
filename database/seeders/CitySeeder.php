<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{

    // private $apiKey;

    public function __construct() {
        $this->apiKey = config('services.rajaongkir.api_key');
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch data from RajaOngkir API
        $apiKey = $this->apiKey;
        // dd($apiKey);
        $response = Http::withHeaders(['key' => $apiKey])->get("https://api.rajaongkir.com/starter/city");

        // Decode JSON response
        $data = $response->json();

        // Insert data into 'cities' table
        if ($data && isset($data['rajaongkir']['results'])) {
            foreach ($data['rajaongkir']['results'] as $city) {
                DB::table('cities')->insert([
                    'city_id' => $city['city_id'],
                    'province_id' => $city['province_id'],
                    'province' => $city['province'],
                    'type' => $city['type'],
                    'city_name' => $city['city_name'],
                    'postal_code' => $city['postal_code'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
