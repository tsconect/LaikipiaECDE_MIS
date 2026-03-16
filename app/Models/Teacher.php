<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    use HasFactory;
    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    function school(){
        return $this->hasOne(EcdeSchools::class,'id','school_id');
    }

    function education(){
        return $this->hasOne(TeacherEducation::class,'teacher_id','id');
    }
    function resident(){
        return $this->hasOne(TeacherResidential::class,'teacher_id','id');
    }

    function school_contact(){
        return $this->hasOne(TeacherSchoolContact::class,'teacher_id','id');
    }

    function unions(){
        return $this->belongsToMany(Unions::class, "teacher_unions", 'teachers_id', 'union_id');
    }

}
