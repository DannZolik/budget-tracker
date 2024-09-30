<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EarningsResource\Pages;
use App\Models\Earnings;
use App\Models\EarningCategory;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;


class EarningsResource extends Resource
{
    protected static ?string $model = Earnings::class;
    // protected static ?string $navigationIcon = 'tabler-coins';
    protected static ?string $navigationGroup = 'Earnings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('description'),
                Select::make('category_id')
                    ->label('Category')
                    ->options(EarningCategory::where('user_id', auth()->id())->pluck('name', 'id'))
                    ->preload()
                    ->searchable(),
                TextInput::make('sum')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('description'),
                TextColumn::make('earningsCategory.name'),
                TextColumn::make('sum'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEarnings::route('/'),
            'create' => Pages\CreateEarnings::route('/create'),
            'edit' => Pages\EditEarnings::route('/{record}/edit'),
        ];
    }
}
