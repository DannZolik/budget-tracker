<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class coinKeeper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinKeeper:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate fresh and seed the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (App::environment('local', 'development')) {
            $this->call('migrate:fresh', ["--seed" => true]);
            $this->info('Application reinstalled successfully.');
        } else {
            $this->error('This command can only be run in a development environment.');
        }

        return 0;
    }
}
