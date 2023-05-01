<?php

namespace App\Services\ReportStrategy;

use Illuminate\Support\Collection;

abstract class ReportGenerator
{
    public abstract function generateReport(Collection $data);

    protected function calculateTotalTime(Collection $tasks): string
    {
        $minutesSum = $tasks->sum('time_spent_minutes');
        $hoursSum = $tasks->sum('time_spent_hours');

        $totalHours = $hoursSum + floor($minutesSum / 60);
        $totalMinutes = $minutesSum % 60;

        return "$totalHours:$totalMinutes";
    }
}
