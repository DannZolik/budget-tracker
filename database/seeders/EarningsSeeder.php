<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Earnings;
use App\Models\EarningCategory;
use Carbon\Carbon;

class EarningsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $users = User::pluck('id')->toArray();
    $categories = Earnings::pluck('id')->toArray();
    $data = [];
    
    for ($i = 0; $i < count($users) * 6; $i++) {
    $data[] = [
    'name' => 'Expense ' . $i,
    'category_id' => rand(1,9),
    'sum' => rand(1, 100),
    'description' => null,
    'created_at' => Carbon::today()->subDays(rand(0, 365)),
    ];
    }
    
    Earnings::insert($data);
    }
}
