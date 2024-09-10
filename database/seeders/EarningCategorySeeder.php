<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\EarningCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EarningCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $earningCategories = ['Salary', 'Scholarship', 'Other'];
        $icons = ['heroicon-s-banknotes', 'heroicon-s-academic-cap', 'heroicon-s-cash'];
        $icons_color = ['#1a1716', '#1a1716', '#1a1716'];
        $bg_color = ['#1be104', '#04dee1', '#cbcbcb'];

        $data = [];

        for ($i = 0; $i < count($earningCategories); $i++) {
            foreach ($userIds as $userId) {
                $data[] = [
                    'name' => $earningCategories[$i],
                    'user_id' => $userId,
                    'icon' => $icons[$i],
                    'icon_color' => $icons_color[$i],
                    'bg_color' => $bg_color[$i],
                ];
            }
        }

        EarningCategory::insert($data);
    }
}
