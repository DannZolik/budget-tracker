<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Earnings;
use App\Models\EarningCategory;
use Carbon\Carbon;
use Faker\Factory as Faker;

class EarningsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $categories = EarningCategory::pluck('id')->toArray();
        $data = [];
        $faker = Faker::create('en_US');

        for ($i = 0; $i < count($users) * 12; $i++) {
            $data[] = [
                'name' => 'Expense ' . $i,
                'user_id' => $users[$i%count($users)],
                'category_id' => $categories[rand(1, count($categories))-1],
                'sum' => rand(1, 100),
                'description' => $faker->text(180),
                'created_at' => Carbon::today()->subDays(rand(0, 60)),
            ];
        }
    
        Earnings::insert($data);
    }
}
