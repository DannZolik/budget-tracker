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
                'phone' => '1234567890',
                'goals' => 'Krāju uz bembīti',
                'password' => bcrypt('demopass'),
            ],
            [
                'name' => 'Admin',
                'role' => 2,
                'avatar' => null,
                'email' => 'admin@budget.com',
                'phone' => '1234567899',
                'goals' => 'Save to buy a lambo',
                'password' => bcrypt('demopass'),
            ],
            [
                'name' => 'Regular User',
                'role' => 3,
                'avatar' => null,
                'email' => 'user@budget.com',
                'phone' => '1234567898',
                'goals' => 'Save money',
                'password' => bcrypt('demopass'),
            ],
        ];

        User::insert($users);
    }
}
