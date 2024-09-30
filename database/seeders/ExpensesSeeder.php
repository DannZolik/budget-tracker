<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Expenses;
use App\Models\ExpenseCategory;
use Carbon\Carbon;


class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $categories = ExpenseCategory::pluck('id')->toArray();

        $data = [];
        
        for ($i = 0; $i < count($users) * 12; $i++) {
            $data[] = [
                'name' => 'Expense ' . $i,
                'user_id' => $users[$i%count($users)],
                'category_id' => $categories[rand(1, count($categories))-1],
                'sum' => rand(1, 100),
                'description' => null,
                'created_at' => Carbon::today()->subDays(rand(0, 60)),
            ];
        }
        
        Expenses::insert($data);
    }
}
