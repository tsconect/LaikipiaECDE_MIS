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

    function parents(){
        return $this->hasMany(LearnerParent::class,'learner_id','id');
    }

    public function nationality(){
        return $this->hasOne(Nationality::class,'id','nationality_id');
    }

    public function ward(){
        return $this->hasOne(Ward::class,'id','ward_id');
    }

    public function subLocation(){
        return $this->hasOne(SubLocation::class,'id','sub_location_id');
    }


}
