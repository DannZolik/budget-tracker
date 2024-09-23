<?php

namespace App\Filament\Resources\EarningCategoryResource\Pages;

use App\Filament\Resources\EarningCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEarningCategories extends ListRecords
{
    protected static string $resource = EarningCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
