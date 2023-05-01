<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskReportRequest;
use App\Repositories\TaskRepository;
use App\Services\ReportStrategy\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TaskReportController extends Controller
{
    private TaskRepository $repository;
    private ReportService $reportService;

    public function __construct(TaskRepository $repository, ReportService $reportService)
    {
        $this->repository = $repository;
        $this->reportService = $reportService;
    }

    public function downloadReport(TaskReportRequest $request): RedirectResponse|BinaryFileResponse|Response
    {
        $tasks = $this->repository->getUserTaskByRange($request->from, $request->to);

        if ($tasks->isEmpty()) {
            return redirect()->back()
                ->with('warning', 'No tasks for selected period');
        }

        return $this->reportService->generateTaskReport($tasks, $request->report_type);
    }
}
