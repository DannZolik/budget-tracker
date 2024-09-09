<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // php artisan migrate:fresh --seed

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@budget.com',
            'password' => bcrypt('demopass'),
        ]);
    }
}
