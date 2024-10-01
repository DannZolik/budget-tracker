<?php

namespace App\Filament\Widgets;

use App\Models\Earnings;
use App\Models\Expenses;
use Illuminate\Support\Facades\Auth;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TotalStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalEarnings = Earnings::where('user_id', Auth::id())->sum('sum');
        $totalSpending = Expenses::where('user_id', Auth::id())->sum('sum');
        $difference = $totalEarnings - $totalSpending;

        if ($difference >= 0) {
            $color = 'success';
        } else {
            $color = 'danger';
        }

        return [
            Stat::make('Total earned', $totalEarnings)
                ->description('The amount of money you have earned')
                ->chart([1, 1, 1])
                ->descriptionIcon('tabler-wallet', IconPosition::Before)
                ->color('success'),
            Stat::make('Total spent', $totalSpending)
                ->description('The amount of money you have spent')
                ->descriptionIcon('tabler-shopping-bag', IconPosition::Before)
                ->chart([1, 1, 1])
                ->color('danger'),
            Stat::make('Difference', $difference)
                ->chart([1, 1, 1])
                ->color($color)
                ->description('The difference between your earnings and spending')
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
        ];
    }
}
