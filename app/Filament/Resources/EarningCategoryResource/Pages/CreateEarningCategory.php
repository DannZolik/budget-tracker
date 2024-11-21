<?php

namespace App\Filament\Resources\EarningCategoryResource\Pages;

use App\Filament\Resources\EarningCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEarningCategory extends CreateRecord
{
    protected static string $resource = EarningCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function beforeCreate()
    {
        $this->data = null;
    }
}
