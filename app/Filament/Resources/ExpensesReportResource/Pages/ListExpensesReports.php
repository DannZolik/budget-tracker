<?php

namespace App\Filament\Resources\ExpensesReportResource\Pages;

use App\Filament\Resources\ExpensesReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpensesReports extends ListRecords
{
    protected static string $resource = ExpensesReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
