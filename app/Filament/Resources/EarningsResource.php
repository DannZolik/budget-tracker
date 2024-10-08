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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;



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
                Hidden::make('user_id')
                ->default(function () {
                    return Auth::id();
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->sortable(),
                TextColumn::make('description'),
                TextColumn::make('earningsCategory.name')->sortable(),
                TextColumn::make('sum')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('user_id', Auth::id());
            })
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
