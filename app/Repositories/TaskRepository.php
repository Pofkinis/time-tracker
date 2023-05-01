<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{
    public function getAllUserTasksPaginated($perPage = 10): LengthAwarePaginator
    {
        return Auth::user()->tasks()
            ->orderBy('deadline')
            ->paginate($perPage);
    }

    public function getUserTaskByRange(string $from, string $to): Collection
    {
        return Auth::user()->tasks()
            ->whereDate('deadline', '>=', $from)
            ->whereDate('deadline', '<=', $to)
            ->get();
    }

    public function createTaskForUser(array $data)
    {
        return Auth::user()->tasks()->create($data);
    }

    public function updateTask(Task $task, array $data): bool
    {
        return $task->update($data);
    }

    public function deleteTask(Task $task): ?bool
    {
        return $task->delete();
    }
}
