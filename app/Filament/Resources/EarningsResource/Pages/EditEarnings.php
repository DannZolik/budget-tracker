<?php

namespace App\Filament\Resources\EarningsResource\Pages;

use App\Filament\Resources\EarningsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEarnings extends EditRecord
{
    protected static string $resource = EarningsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
