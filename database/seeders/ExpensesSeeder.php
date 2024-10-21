<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Expenses;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $categories = ExpenseCategory::select('id','user_id')->get()->toArray();
        $faker = Faker::create('en_US');
        $data = [];
        for ($i = 0; $i < count($users) * 12; $i++) {
            $userId = $users[$i%count($users)]; 
            $categoryId = $categories[rand(1, count($categories))-1]; 
            if($categoryId["user_id"] == $userId){
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
        
        Expenses::insert($data);
    }
}
