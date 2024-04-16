<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\category;
use App\Models\Stokbarang;
use App\Models\Role;
use App\Models\Kelola_data_ksm;
use App\Models\Kelola_data_event;

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
        // \App\Models\User::factory(10)->create();

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

        if (category::count() == 0) {
            $seeder[] = CategorySeeder::class;
        }

        if (Stokbarang::count() == 0) {
            $seeder[] = ItemSeeder::class;
        }

        if (Kelola_data_ksm::count() == 0) {
            $seeder[] = KsmSeeder::class;
        }

        if (Kelola_data_event::count() == 0) {
            $seeder[] = EventSeeder::class;
        }
        // if (Role::count() == 0) {
        //     $seeder[] = RoleSeeder::class;
        // }

        $this->call($seeder);
    }
}
