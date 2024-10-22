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
                ->description(__('dashboard.earned'))
                ->chart([1, 1, 1])
                ->descriptionIcon('tabler-wallet', IconPosition::Before)
                ->color('success'),
            Stat::make('Total spent', $totalSpending)
                ->description(__('dashboard.spent'))
                ->descriptionIcon('tabler-shopping-bag', IconPosition::Before)
                ->chart([1, 1, 1])
                ->color('danger'),
            Stat::make('Difference', $difference)
                ->chart([1, 1, 1])
                ->color($color)
                ->description(__('dashboard.difference'))
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
        ];
    }
}
