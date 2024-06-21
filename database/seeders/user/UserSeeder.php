<?php

namespace Database\Seeders\user;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'admin',
            'name' => 'admin',
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15A',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
        ]);

        User::create([
            'role' => 'kepalabagian',
            'name' => 'kepalabagian',
            'password' => bcrypt('kepalabagian'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15B',
            'email' => 'kepalabagian@kepalabagian.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'ksm',
            'password' => bcrypt('ksm'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15C',
            'email' => 'ksm@ksm.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'ksm2',
            'password' => bcrypt('ksm2'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15C',
            'email' => 'ksm2@ksm2.com',
        ]);

        User::create([
            'role' => 'pembeli',
            'name' => 'pembeli',
            'password' => bcrypt('pembeli'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15D',
            'email' => 'pembeli@pembeli.com',
        ]);

        User::create([
            'role' => 'pembeli',
            'name' => 'pembeli2',
            'password' => bcrypt('pembeli2'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15E',
            'email' => 'pembeli2@pembeli2.com',
        ]);

        User::create([
            'role' => 'pembeli',
            'name' => 'pembeli3',
            'password' => bcrypt('pembeli3'),
            'no_wa' => '089123456789',
            'city_id' => 22,
            'address' => 'Jl. Setia Budi No. 15F',
            'email' => 'pembeli3@pembeli3.com',
        ]);
    }
}
