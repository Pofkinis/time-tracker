<?php

namespace App\Services\ReportStrategy;

use Illuminate\Support\Collection;

class ReportService
{
    public function generateTaskReport(Collection $tasks, string $format)
    {
        $reportGenerator = ReportGeneratorFactory::create($format);

        return $reportGenerator->generateReport($tasks);
    }
}
