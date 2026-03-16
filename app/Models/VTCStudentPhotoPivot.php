<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTCStudentPhotoPivot extends Model
{
    use HasFactory;

    protected $table = 'vct_students_photo';

    protected $guarded = [];
}
