<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerParent extends Model
{
    use HasFactory;

    public function learner(){
        return $this->hasOne(Learner::class,'id','learner_id');
    }

    public function ward(){
        return $this->hasOne(Ward::class,'id','ward_id');
    }
}
