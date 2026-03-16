<?php

namespace App\Models;

use App\Models\User;
use App\Models\Location;
use App\Models\Siblings;
use App\Models\StudentParents;
use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'gender',
        'last_name',
        'id_birth_cert_no',
        'date_of_birth',
        'county',
        'sub_county',
        'ward',
        'location',
        'location_id',
        'marital_status',
        'religion',
        'employment_status',
        'kra_pin',
        'profile_status',
        'comment',
        
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(StudentApplications::class, 'student_id', 'id');
    }
    
    public function student_location()
    {
        return $this->belongsTo(Location::class, 'location');
    }
    public function parent()
    {
        return $this->hasMany(StudentParents::class, 'student_id', 'id');
    }

    public function siblings()
    {
        return $this->hasMany(Siblings::class);
    }

    public function school()
    {
        return $this->hasOne(SchoolDetails::class, 'student_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'student_id');
    }


}
