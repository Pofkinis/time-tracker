<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'report_type' => 'required|string|in:csv,pdf,excel',
            'from' => 'required|date',
            'to' => 'required|date',
        ];
    }
}
