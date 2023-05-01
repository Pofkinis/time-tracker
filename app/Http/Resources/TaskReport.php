<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskReport extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'comment' => $this->comment,
            'deadline' => $this->deadline->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d'),
            'time_spent' => "$this->time_spent_hours:$this->time_spent_minutes",
        ];
    }
}
