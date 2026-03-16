<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTCDepartments extends Model
{
    use HasFactory;

    protected $guarded = [];

    function courses()
    {
        # code...
        return $this->hasMany(VTCCourses::class, 'vtc_dpt_id', 'id');
    }

}
