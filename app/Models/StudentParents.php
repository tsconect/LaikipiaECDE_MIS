<?php

namespace App\Models;

use App\Models\StudentDetails;
use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentParents extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'first_name',
        'last_name',
        'who_pays_fees',
        'parents_status',
        'occupation',
        'application_id',
        'phone',
        'parental_status',
        'disability_status',
        'annual_salary',
        'parent_type'
    ];
    public function student()
    {
        return $this->hasOne(StudentDetails::class, 'student_id', 'id');
    }


    public function application()
    {
        return $this->belongsTo(StudentApplications::class);
    }
}
