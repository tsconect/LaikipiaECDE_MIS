<?php

namespace App\Models;

use App\Models\StudentDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siblings extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'school',
        'admission',
        'fees',
        'student_details_id',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(StudentDetails::class);
    }
}
