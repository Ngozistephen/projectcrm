<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        $admin = User::create([
            'first_name' => 'stephen',
            'last_name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), 
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'first_name' => 'user',
            'last_name' => 'will be',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        $user->assignRole('user');

        User::factory()->count(50)->create();
        User::factory()->count(20)->deleted()->create();
    }
}
