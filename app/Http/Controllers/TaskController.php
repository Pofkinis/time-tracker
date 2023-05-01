<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    private TaskRepository $repository;
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): View
    {
        $tasks = $this->repository->getAllUserTasksPaginated();

        return view('tasks.index')->with('tasks', $tasks);
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $this->repository->createTaskForUser($request->getData());

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit')->with('task', $task);
    }

    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $this->repository->updateTask($task, $request->getData());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->repository->deleteTask($task);

        return redirect()->route('tasks.index');
    }
}
