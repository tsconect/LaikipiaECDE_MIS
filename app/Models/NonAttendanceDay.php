<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonAttendanceDay extends Model
{
    protected $fillable = [
        'type',
        'date',
        'weekday',
        'title',
        'is_recurring'
    ];

    protected $casts = [
        'date' => 'date',
        'is_recurring' => 'boolean'
    ];
}