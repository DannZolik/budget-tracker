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
        $categories = EarningCategory::select('id','user_id')->get()->toArray();
        $data = [];
        $faker = Faker::create('en_US');

        for ($i = 0; $i < count($users) * 12; $i++) {
            $userId = $users[$i%count($users)]; // Random user
            $categoryId = $categories[rand(1, count($categories))-1]; // Picks random created category created by user
            if($categoryId["user_id"] == $userId){ // If randomly selected category creator is same as random user 
                $data[] = [
                    'name' => 'Expense ' . $i,
                    'user_id' => $userId,
                    'category_id' => $categoryId["id"],
                    'sum' => rand(1, 100),
                    'description' => $faker->text(180),
                    'created_at' => Carbon::today()->subDays(rand(0, 60)),
                ];
            }else{
                $i--;
            }
        }
    
        Earnings::insert($data);
    }
}
