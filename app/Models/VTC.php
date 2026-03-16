<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTC extends Model
{
    use HasFactory;

    protected $guarded = [];

    // courses
    function courses()
    {
        # code...
        return $this->hasMany(VTCCourses::class, 'vtc_id', 'id');
    }

    // depts
    function departments()
    {
        # code...
        return $this->hasMany(VTCDepartments::class, 'vtc_id', 'id');
    }

    function teachers()
    {
        # code...
        return $this->hasMany(VTCTeacher::class, 'school_id', 'id');
    }

    function other_staffs()
    {
        # code...
        return $this->hasMany(OtherVTCStaff::class, 'school_id', 'id');
    }

    //students
    function students()
    {
        # code...
        return $this->belongsToMany(Students::class, "vtc_students_pivot" , 'vtc_id' , 'student_id');
    }



}
