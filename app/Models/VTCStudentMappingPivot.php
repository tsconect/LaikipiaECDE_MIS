<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTCStudentMappingPivot extends Model
{
    use HasFactory;
    protected $table = 'vtc_students_pivot';
    protected $guarded = [];
}
