<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $user_id
 */

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'deadline' => 'date'
    ];

    protected $fillable = [
        'title',
        'comment',
        'deadline',
        'time_spent_hours',
        'time_spent_minutes',
    ];
}
