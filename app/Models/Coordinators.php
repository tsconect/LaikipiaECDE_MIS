<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinators extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    function constituency(){
        return $this->belongsTo(Constituency::class, 'subcounty_id', 'constituency_id');
    }

    function ward(){
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    function ethnicGroup(){
        return $this->belongsTo(EthnicGroup::class, 'ethnicity_id', 'id');
    }

    function school(){
        return $this->belongsTo(EcdeSchools::class, 'school_id', 'id');
    }
    
    function education(){
        return $this->hasOne(TeacherEducation::class,'teacher_id','id');
    }

    function resident(){
        return $this->hasOne(TeacherResidential::class,'teacher_id','id');
    }

    function school_contact(){
        return $this->hasOne(TeacherSchoolContact::class,'teacher_id','id');
    }
}
