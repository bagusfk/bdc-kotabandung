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
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
        ]);

        User::create([
            'role' => 'kepalabagian',
            'name' => 'kepalabagian',
            'password' => bcrypt('kepalabagian'),
            'no_wa' => '089123456789',
            'email' => 'kepalabagian@kepalabagian.com',
        ]);

        User::create([
            'role' => 'ksm',
            'name' => 'ksm',
            'password' => bcrypt('ksm'),
            'no_wa' => '089123456789',
            'email' => 'ksm@ksm.com',
        ]);

        User::create([
            'role' => 'pembeli',
            'name' => 'pembeli',
            'password' => bcrypt('pembeli'),
            'no_wa' => '089123456789',
            'email' => 'pembeli@pembeli.com',
        ]);
    }
}
