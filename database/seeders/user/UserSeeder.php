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
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'no_wa' => '089123456789',
            'email' => 'admin@gmail.com',
            'role_id' => 1
        ]);

        User::create([
            'username' => 'kepalabagian',
            'password' => bcrypt('kepalabagian'),
            'no_wa' => '089123456789',
            'email' => 'kepalabagian@gmail.com',
            'role_id' => 2
        ]);

        User::create([
            'username' => 'ksm',
            'password' => bcrypt('ksm'),
            'no_wa' => '089123456789',
            'email' => 'ksm@gmail.com',
            'role_id' => 3
        ]);

        User::create([
            'username' => 'pembeli',
            'password' => bcrypt('pembeli'),
            'no_wa' => '089123456789',
            'email' => 'pembeli@gmail.com',
            'role_id' => 4
        ]);
    }
}
