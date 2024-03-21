<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;

use Database\Seeders\user\UserSeeder;
use Database\Seeders\user\RoleSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /**
     * Run the database seeds.
     */
        $seeder = [];

        if (User::count() == 0) {
            $seeder[] = UserSeeder::class;
        }
        if (Role::count() == 0) {
            $seeder[] = RoleSeeder::class;
        }

        $this->call($seeder);
    }
}
