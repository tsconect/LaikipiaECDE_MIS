<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcdeSchools extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ward(){
        return $this->hasOne(Ward::class,'id','ward_id');
    }

    public function teacher(){
        return $this->hasOne(Teacher::class,'id','teacher_id');
    }

    
}
