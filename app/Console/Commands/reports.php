<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Earning;
use App\Models\Expense;
use Carbon\Carbon;

class reports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinKeeper:reports {startDate} {endDate}';

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
        $startDate = Carbon::parse($this->argument('startDate'));
        $endDate = Carbon::parse($this->argument('endDate'));

        $incomes = Earning::whereBetween('earning_date', [$startDate, $endDate])->get();
        $expenses = Expense::whereBetween('expense_date', [$startDate, $endDate])->get();


        $this->info("Report from {$startDate->toDateString()} to {$endDate->toDateString()}");

        $totalIncome = $incomes->sum('amount');
        $totalExpense = $expenses->sum('amount');

        $this->info("Report from {$startDate->toDateString()} to {$endDate->toDateString()}");


        $this->info("Incomes:");
        foreach ($incomes as $income) {
            $this->line(" - {$income->description}: {$income->amount} (Created at: {$income->created_at})");
        }

        $this->info("Expenses:");
        foreach ($expenses as $expense) {
            $this->line(" - {$expense->description}: {$expense->amount} (Created at: {$expense->created_at})");
        }
        
        $this->info("Total Income: $totalIncome");
        $this->info("Total Expenses: $totalExpense");
        $this->info("Net: " . ($totalIncome - $totalExpense));

        return 0;
    }
}