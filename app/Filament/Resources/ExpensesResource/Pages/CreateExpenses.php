<?php

namespace App\Filament\Resources\ExpensesResource\Pages;

use App\Filament\Resources\ExpensesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExpenses extends CreateRecord
{
    protected static string $resource = ExpensesResource::class;

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
