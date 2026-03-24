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

    public function jobGroup(){
        return $this->hasOne(JobGroup::class,'id','job_group_id');
    }

    function school(){
        return $this->hasOne(EcdeSchools::class,'id','school_id');
    }



}
