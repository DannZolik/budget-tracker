<?php

namespace App\Filament\Resources\ExpensesResource\Pages;

use App\Filament\Resources\ExpensesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpenses extends EditRecord
{
    protected static string $resource = ExpensesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {

    return $this->getResource()::getUrl('index');

    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['sum'] == "-0") {
            $data['sum'] = 0;
        }

        return $data;
    }
}
