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
            Artisan::call('coinKeeper:reports yesterday');
            Artisan::call('coinKeeper:reports lastweek');
            Artisan::call('coinKeeper:reports thismonth');
            Artisan::call('coinKeeper:reports lastmonth');
        } else {
            $this->command->error('This command can only be run in a development environment.');
        }
    }
}
