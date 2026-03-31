<?php

namespace App\Models;

use App\Models\EcdeSchools;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDeploymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'school_id',
        'deployment_date',
        'start_date',
        'end_date',
        'reason',
        'file_attachment',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault('first_name', 'last_name')->select('id', 'first_name', 'last_name');
    }

    public function school()
    {
        return $this->belongsTo(EcdeSchools::class, 'school_id');
    }
}
