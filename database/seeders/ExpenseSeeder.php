<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $expenses = ExpenseCategory::pluck('id')->toArray();

        $data = [];

        for ($i = 0; $i < count($users) * 6; $i++) {
            $data[] = [
                'name' => 'Expense ' . $i,
                'user_id' => $users[array_rand($users)],
                'expense_category_id' => $expenses[array_rand($expenses)],
                'amount' => rand(1, 100),
                'description' => null,
                'expense_date' => now(),
            ];
        }

        Expense::insert($data);
    }
}
