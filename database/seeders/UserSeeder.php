<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // php artisan coinKeeper:fresh
        $users = [
            [
                'name' => 'Super Admin',
                'role' => 1,
                'avatar' => null,
                'email' => 'superadmin@budget.com',
                'password' => bcrypt('demopass'),
            ],
            [
                'name' => 'Admin',
                'role' => 2,
                'avatar' => null,
                'email' => 'admin@budget.com',
                'password' => bcrypt('demopass'),
            ],
            [
                'name' => 'Regular User',
                'role' => 3,
                'avatar' => null,
                'email' => 'user@budget.com',
                'password' => bcrypt('demopass'),
            ],
        ];

        User::insert($users);
    }
}
