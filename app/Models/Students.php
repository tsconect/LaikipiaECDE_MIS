<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;


    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    function type(){
        return $this->hasOne(StudentType::class,'id','stundent_type_id');
    }

    public function Location()
    {
        return $this->belongsTo(Location::class, 'location_id');
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
