<?php

namespace App\Services\ReportStrategy;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class PdfReportGenerator extends ReportGenerator
{

    public function generateReport(Collection $data): Response
    {
        $pdfData = [
            'tasks' => $data,
            'totalTime' => $this->calculateTotalTime($data)
        ];

        $pdf = PDF::loadView('pdfs.tasks-report', $pdfData);

        return $pdf->download('report.pdf');
    }
}
