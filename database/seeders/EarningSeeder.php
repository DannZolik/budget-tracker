<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Earning;
use App\Models\EarningCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EarningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $earnings = EarningCategory::pluck('id')->toArray();

        $data = [];

        for ($i = 0; $i < count($users) * 6; $i++) {
            $data[] = [
                'name' => 'Earning ' . $i,
                'user_id' => $users[array_rand($users)],
                'earning_category_id' => $earnings[array_rand($earnings)],
                'amount' => rand(1, 100),
                'description' => null,
                'earning_date' => now(),
            ];
        }

        Earning::insert($data);
    }
}
