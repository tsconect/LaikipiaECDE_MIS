<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcdeSchools extends Model
{
    use HasFactory;

    protected $guarded = [];

    function const(){
        return $this->hasOne(Constituency::class,'id','constituency');
    }
    function ward(){
        return $this->hasOne(Wards::class,'id','ward');
    }
}
