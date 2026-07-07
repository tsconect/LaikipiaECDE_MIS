<?php

namespace App\Models;

use App\Models\EcdeSchools;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    use HasFactory;
    use HasFactory;

    protected $fillable = [

    'user_id',
    'id_number',
    'kra_pin',
    'gender',
    'dob',
    'tsc_number',
    'image_path',
    'school_id',
    'ippd_number',
    'date_of_first_appointment',
    'terms_of_engagement',
    'pwd_status',
    'disability_type',
    'impairment_details',
    'pwd_number',
    'ethnicity_id',
    'job_group_id',
    'county_id',
    'subcounty_id',
    'ward_id',
    'contract_expiry',
    'retirement_date',
    'job_group',
    'remarks',
    'ethnicity',
];

    protected $casts = [
        'retirement_date' => 'date:Y-m-d',
    ];
    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }



    public function jobGroup(){
        return $this->hasOne(JobGroup::class,'id','job_group_id');
    }

    function school(){
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

    public function education(){
        return $this->hasOne(TeacherEducation::class,'teacher_id','id');
    }
}
