<?php

namespace App\Jobs;

use App\Models\EarningReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessEarningReportExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $batchData;

    public function __construct($batchData)
    {
        $this->batchData = $batchData;
    }

    public function handle()
    {
        // Process each chunk of earning report data
        foreach ($this->batchData as $data) {
            // Here, you'd implement the logic for handling this chunk (e.g., export to CSV or XLSX)
            // For demonstration, we'll just log each item to storage
            Storage::append('earning_report_export.log', json_encode($data));
        }
    }
}
