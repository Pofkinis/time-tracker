<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'comment' => 'nullable|string|max:1000',
            'deadline' => 'nullable|date',
            'time_spent_hours' => 'nullable|integer|gte:0',
            'time_spent_minutes' => 'nullable|integer|gte:0|lte:59',
        ];
    }

    public function getData(): array
    {
        return [
            'title' => $this->title,
            'comment' => $this->comment,
            'deadline' => $this->deadline,
            'time_spent_hours' => $this->time_spent_hours,
            'time_spent_minutes' => $this->time_spent_minutes,
        ];
    }
}
