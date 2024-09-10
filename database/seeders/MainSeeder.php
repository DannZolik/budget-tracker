<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            EarningCategorySeeder::class,
            ExpenseCategorySeeder::class,
            EarningSeeder::class,
            ExpenseSeeder::class,
        ]);
    }
}
