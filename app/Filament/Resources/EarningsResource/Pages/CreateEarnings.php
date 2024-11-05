<?php

namespace App\Filament\Resources\EarningsResource\Pages;

use App\Filament\Resources\EarningsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEarnings extends CreateRecord
{
    protected static string $resource = EarningsResource::class;

    protected function getRedirectUrl(): string
    {

    return $this->getResource()::getUrl('index');

    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['sum'] == "-0") {
            $data['sum'] = 0;
        }

        return $data;
    }
}
