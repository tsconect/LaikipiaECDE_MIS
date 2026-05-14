<?php

namespace App\Models;

use App\Models\LearnerParent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    use HasFactory;

    protected $fillable = [

    'first_name',
    'middle_name',
    'last_name',

    'pwd_status',
    'disability_type',
    'impairment_details',

    'dob',
    'nemis_number',

    'sub_location_id',
    'student_type_id',

    'gender',

    'village',
    'village_id',

    'school_id',

    'passport_photo',

    'class',

    'mode_of_admission',

    'date_of_admission',

    'birth_certificate_number',

    'nationality_id',

    'admission_number',

    'pwd_number',

    'ward_id',

    'family_setup',

    'nationality',

    'parental_status',
];



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

    public function attendances(){
        return $this->hasMany(LearnerAttendance::class,'learner_id','id');
    }


}
