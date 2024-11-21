<?php

namespace App\Filament\Exports;

use App\Models\EarningReport;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Contracts\Queue\ShouldQueue;  // Add this import to handle batch jobs

class EarningReportExporter extends Exporter implements ShouldQueue  // Implement ShouldQueue
{
    protected static ?string $model = EarningReport::class;
    // Izveido kolonoas kuras tiks eksportētas
    // Piedāvā lietotājam izvēlēties datus
    public static function getColumns(): array
    {
        // Izveido masīvu kas satur eksportējamos datus
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user_id'),
            ExportColumn::make('sum'),
            ExportColumn::make('from_date'),
            ExportColumn::make('to_date'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }
    // Izvada eksportu caur notifikāciju
    public static function getCompletedNotificationBody(Export $export): string
    {
        // Teksts kuru redzēs lietotājs, kā arī kalkulācija cik datu rindiņas tiek izvadītas
        $body = 'Your earning report export has completed and ' .
        number_format($export->successful_rows). ' ' .
        str('row')->plural($export->successful_rows) . ' exported.';
        //Ja kaut kas nesanāk ar izvadi, izvada cik rindiņas netika eksportētas
        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' .
            str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
