<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (App::environment('local', 'development')) {
            $periods = ['yesterday', 'lastweek', 'thismonth', 'lastmonth'];
            
            foreach ($periods as $period) {
                Artisan::call("coinKeeper:reports {$period}");
            }
        } else {
            $this->command->error('This command can only be run in a development environment.');
        }
    }
}
