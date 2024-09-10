<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $expenseCategories = ['Food', 'Transport', 'Entertainment', 'Health', 'Education', 'Other'];
        $icons = ['heroicon-s-restaurant', 'heroicon-s-car', 'heroicon-s-ticket', 'heroicon-s-medical-cross', 'heroicon-s-academic-cap', 'heroicon-s-cash'];
        $icons_color = ['#1a1716', '#1a1716', '#1a1716', '#1a1716', '#1a1716', '#1a1716'];
        $bg_color = ['#1be104', '#04dee1', '#cbcbcb', '#1be104', '#04dee1', '#cbcbcb'];

        $data = [];

        for ($i = 0; $i < count($expenseCategories); $i++) {
            foreach ($users as $userId) {
                $data[] = [
                    'name' => $expenseCategories[$i],
                    'user_id' => $userId,
                    'icon' => $icons[$i],
                    'icon_color' => $icons_color[$i],
                    'bg_color' => $bg_color[$i],
                ];
            }
        }

        ExpenseCategory::insert($data);
    }
}
