<?php

namespace App\Models;

use App\Models\StudentDetails;
use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'school_name',
        'level_of_study',
        'admission_number',
        'school_category',
        'year_of_study',
        'county',
        'physical_address',
        'contact_person',
    ];

    public function student()
    {
        return $this->belongsTo(StudentDetails::class, 'student_id');
    }
}
