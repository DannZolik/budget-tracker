<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'lv', 'ru']);
        });

        Filament::registerNavigationGroups([
            'Expenses' => NavigationGroup::make()
                ->label('Expenses')
                ->icon('tabler-shopping-bag'),
            'Earnings' => NavigationGroup::make()
                ->label('Earnings')
                ->icon('tabler-wallet'),
            'Reports' => NavigationGroup::make()
                ->label('Reports')
                ->icon('tabler-report-analytics'),
            'System' => NavigationGroup::make()
                ->label('System')
                ->icon('tabler-settings'),
        ]);
    }
}
