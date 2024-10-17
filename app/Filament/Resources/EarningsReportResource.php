<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EarningsReportResource\Pages;
use App\Models\EarningReport;
use App\Filament\Exports\EarningReportExporter;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ExportAction;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\Builder;

class EarningsReportResource extends Resource
{
    protected static ?string $model = EarningReport::class;

    protected static ?string $navigationGroup = 'Reports';

    /**
     * Define the form schema if needed for your resource.
     */
    public static function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form->schema([]);
    }

    /**
     * Define the table schema for the resource.
     */
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
           //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make('export')
                    ->label('Export All Earning Reports')
                    ->exporter(EarningReportExporter::class)
            ]);
    }

    /**
     * Define the resource pages.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEarningsReports::route('/'),
        ];
    }
}
