<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpensesReportResource\Pages;
use App\Models\ExpensesReport;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ExportAction;
use App\Filament\Exports\ExpenseReportExporter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class ExpensesReportResource extends Resource
{
    protected static ?string $model = ExpensesReport::class;
    // protected static ?string $navigationIcon = 'heroicon-o-document-minus';
    protected static ?string $navigationGroup = 'Reports';

    public static function canView(Model $record): bool
    {
        return $record->user_id == Auth::id() || Auth::user()->role < 3;
    }
    public static function canEdit(Model $record): bool
    {
        return $record->user_id == Auth::id() || Auth::user()->role < 3;
    }
    public static function canDelete(Model $record): bool
    {
        return $record->user_id == Auth::id() || Auth::user()->role < 3;
    }

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
            ->modifyQueryUsing(function (Builder $query) {
                if (Auth::user()->role==3){
                    return $query->where('user_id', Auth::id());
                }
                return $query;
            })
            ->columns([
                TextColumn::make('user.name')
                    ->label('User name')
                    ->visible(function() {
                        return Auth::user()->role<3;
                        }
                    )
                    ->sortable(),
                TextColumn::make('from_date')
                    ->label('From Date')
                    ->date('d-m-Y')
                    ->sortable(),
                TextColumn::make('to_date')
                    ->label('To Date')
                    ->date('d-m-Y')
                    ->sortable(),
                TextColumn::make('sum')
                    ->label('Total Expenses')
                    ->sortable(),
            ])
            ->filters([
                //
                Tables\Filters\Filter::make('from_date')
                    ->form([
                        DateTimePicker::make('date_from')
                            ->native(false)
                    ])
                    ->query(
                        function (Builder $query, array $data): Builder {
                            if (empty($data['date_from'])) {
                                return $query;
                            }

                            return $query->where('from_date', '>=', $data['date_from']);
                        }
                    ),
                Tables\Filters\Filter::make('to_date')
                    ->form([
                        DateTimePicker::make('date_to')
                            ->native(false)
                    ])
                    ->query(
                        function (Builder $query, array $data): Builder {
                            if (empty($data['date_to'])) {
                                return $query;
                            }

                            return $query->where('to_date', '<=', $data['date_to']);
                        }
                    )
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
