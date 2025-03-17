<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();
        // \App\Models\User::factory(10)->create();
        \App\Models\Role::truncate();
        \App\Models\Permission::truncate();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
        ]);


    }
}
