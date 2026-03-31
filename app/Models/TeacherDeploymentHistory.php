<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDeploymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'school_id',
        'deployment_date',
        'start_date',
        'end_date',
        'reason',
        'file_attachment',
    ];
}
