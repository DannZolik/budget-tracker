<?php

namespace App\Filament\Resources\EarningsReportResource\Pages;

use App\Filament\Resources\EarningsReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEarningsReports extends ListRecords
{
    protected static string $resource = EarningsReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
