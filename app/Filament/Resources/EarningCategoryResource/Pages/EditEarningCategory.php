<?php

namespace App\Filament\Resources\EarningCategoryResource\Pages;

use App\Filament\Resources\EarningCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEarningCategory extends EditRecord
{
    protected static string $resource = EarningCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
