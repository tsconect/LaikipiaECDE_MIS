<?php

namespace App\Models;

use App\Models\EcdeSchools;
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

    function ecdeSchool(){
        return $this->hasOne(EcdeSchools::class,'id','school_id');
    }

     public function county(){
        return $this->belongsTo(County::class, 'county_id', 'county_id');
    }

    public function subcounty(){
        return $this->belongsTo(Constituency::class, 'subcounty_id', 'constituency_id');
    }

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    public function ethnicGroup(){
        return $this->belongsTo(EthnicGroup::class, 'ethnicity_id', 'id');
    }



}
