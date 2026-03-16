<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherResidential extends Model
{
    use HasFactory;

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
