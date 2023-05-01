<?php

namespace App\Exports;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TaskExport implements FromCollection, WithHeadings, WithColumnWidths
{
    private AnonymousResourceCollection $tasks;
    private string $totalTime;

    public function __construct(AnonymousResourceCollection $tasks, string $totalTime)
    {
        $this->tasks = $tasks;
        $this->totalTime = $totalTime;
    }

    public function collection(): Collection
    {
        return $this->tasks->collection
            ->push(
                collect([
                    '', '', '', 'Total Time Spent', $this->totalTime
                ])
            );
    }

    public function headings(): array
    {
        return ['Title', 'Comment', 'Deadline', 'Created At', 'Time spent'];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
        ];
    }
}
