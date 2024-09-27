<?php

namespace App\Filament\Resources\EarningsResource\Pages;

use App\Filament\Resources\EarningsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEarnings extends ListRecords
{
    protected static string $resource = EarningsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
