<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VTCTeacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    // function school(){
    //     return $this->hasOne(EcdeSchools::class,'id','school_id');
    // }

    function school(){
        return $this->hasOne(VTC::class,'id','school_id');
    }

    function const()
    {
        return $this->hasOne(Constituency::class, 'id', "constituency_id");
    }

    function ward()
    {
        # code...
        return $this->hasOne(Wards::class, 'id', 'ward_id');
    }



}
