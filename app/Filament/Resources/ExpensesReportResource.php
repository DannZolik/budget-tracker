<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpensesReportResource\Pages;
use App\Models\ExpensesReport;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ExportAction;
use App\Filament\Exports\ExpenseReportExporter;


class ExpensesReportResource extends Resource
{
    protected static ?string $model = ExpensesReport::class;
    // protected static ?string $navigationIcon = 'heroicon-o-document-minus';
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
                    ->label('User name')
                    ->sortable(),
                TextColumn::make('from_date')
                    ->label('From Date')
                    ->sortable(),
                TextColumn::make('to_date')
                    ->label('To Date')
                    ->sortable(),
                TextColumn::make('sum')
                    ->label('Total Expenses')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make('export')
                    ->label('Export All Expense Reports')
                    ->exporter(ExpenseReportExporter::class)
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
            'index' => Pages\ListExpensesReports::route('/'),
        ];
    }
}
