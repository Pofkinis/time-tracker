<?php

namespace App\Services\ReportStrategy;

use App\Exports\TaskExport;
use App\Http\Resources\TaskReport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CsvReportGenerator extends ReportGenerator
{

    public function generateReport(Collection $data): BinaryFileResponse
    {
        return Excel::download(
            new TaskExport(TaskReport::collection($data),
                $this->calculateTotalTime($data)),
            'tasks.csv',
            \Maatwebsite\Excel\Excel::CSV
        );
    }
}
