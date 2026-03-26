<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;


    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }


    function type(){
        return $this->hasOne(StudentType::class,'id','stundent_type_id');
    }

    function school(){
        return $this->hasOne(EcdeSchools::class,'id','school_id');
    }

    public function education(){
        return $this->hasOne(TeacherEducation::class,'teacher_id','id');
    }

    // school
    // this belongs to a vtc
    // function vtc()
    // {
    //     # code...
    //     return $this->hasOne(VTC::class, )
    // }

    // this belongs to a dpt
    // this belongs to a course .. >> one -> one
}
