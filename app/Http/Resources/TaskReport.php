<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskReport extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hours = $this->time_spent_hours ?? 0;
        $minutes = $this->time_spent_minutes ?? 0;

        return [
            'title' => $this->title,
            'comment' => $this->comment,
            'deadline' => $this->deadline->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d'),
            'time_spent' => "$hours:$minutes",
        ];
    }
}
