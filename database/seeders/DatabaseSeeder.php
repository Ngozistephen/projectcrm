<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TaskSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ClientSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\RolesandPermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([ 
            ClientSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
            RolesandPermissionSeeder::class,
            UserSeeder::class,
        ]);
    }
}
