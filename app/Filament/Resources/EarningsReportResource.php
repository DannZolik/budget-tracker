<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EarningsReportResource\Pages;
use App\Filament\Resources\EarningsReportResource\RelationManagers;
use App\Models\EarningReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class EarningsReportResource extends Resource
{
    protected static ?string $model = EarningReport::class;
    // protected static ?string $navigationIcon = 'heroicon-o-document-plus';
    protected static ?string $navigationGroup = 'Reports';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable(),
                TextColumn::make('from_date')
                    ->label('From Date')
                    ->sortable(),
                TextColumn::make('to_date')
                    ->label('To Date')
                    ->sortable(),
                TextColumn::make('sum')
                    ->label('Total Earnings')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEarningsReports::route('/'),
        ];
    }
}
