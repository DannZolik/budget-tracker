<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class reports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinKeeper:reports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create reports for expenses and earnings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('TEST FOR REPORT FUNCTION');
        return 0;
    }
}
