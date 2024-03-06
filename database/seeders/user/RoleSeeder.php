<?php

namespace Database\Seeders\user;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'nama' => 'admin',
            'url' => '-'
        ]);

        Role::create([
            'nama' => 'kepala bagian ekonomi',
            'url' => '-'
        ]);

        Role::create([
            'nama' => 'ksm',
            'url' => '-'
        ]);

        Role::create([
            'nama' => 'pembeli',
            'url' => '-'
        ]);
    }
}
