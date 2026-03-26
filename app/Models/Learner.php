<?php

namespace App\Models;

use App\Models\LearnerParent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    use HasFactory;

    function school(){
        return $this->hasOne(EcdeSchools::class,'id','school_id');
    }

    function parent(){
        return $this->hasOne(LearnerParent::class,'learner_id','id');
    }


}
