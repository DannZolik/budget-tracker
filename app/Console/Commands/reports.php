<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\EarningReport;
use App\Models\ExpensesReport;
use Carbon\Carbon;

class reports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinKeeper:reports {period}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create reports for expenses and earnings per user and save to the database based on the period (yesterday, last week, last month)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the input period
        $period = strtolower($this->argument('period'));

        // Determine the date range based on the period
        switch ($period) {
            case 'yesterday':
                $startDate = Carbon::yesterday();
                $endDate = Carbon::yesterday();
                break;

            case 'lastweek':
                $startDate = Carbon::now()->subDays(7);
                $endDate = Carbon::now();
                break;

            case 'lastmonth':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'thismonth':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;

            default:
                $this->error('Invalid period. Please use "yesterday", "lastweek", "thismonth", or "lastmonth".');
                return 1;
        }

        // Fetch earnings and expenses grouped by user
        $earningsByUser = Earning::whereBetween('earning_date', [$startDate, $endDate])
                                 ->groupBy('user_id')
                                 ->selectRaw('user_id, SUM(amount) as total_earnings')
                                 ->get();

        $expensesByUser = Expense::whereBetween('expense_date', [$startDate, $endDate])
                                 ->groupBy('user_id')
                                 ->selectRaw('user_id, SUM(amount) as total_expenses')
                                 ->get();

        // Saving Earning Reports to Database
        foreach ($earningsByUser as $earning) {
            EarningReport::create([
                'user_id' => $earning->user_id,
                'sum' => $earning->total_earnings,
                'from_date' => $startDate->toDateString(),
                'to_date' => $endDate->toDateString(),
            ]);
        }

        // Saving Expense Reports to Database
        foreach ($expensesByUser as $expense) {
            ExpensesReport::create([
                'user_id' => $expense->user_id,
                'sum' => $expense->total_expenses,
                'from_date' => $startDate->toDateString(),
                'to_date' => $endDate->toDateString(),
            ]);
        }

        if($earningsByUser->isEmpty()){
            $this->error('empty data');
        }
        else{
        $this->info("Reports from {$startDate->toDateString()} to {$endDate->toDateString()} have been saved.");
        return 0;
        }
    }
}
