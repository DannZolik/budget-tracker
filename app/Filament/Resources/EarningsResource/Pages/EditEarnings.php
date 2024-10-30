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
