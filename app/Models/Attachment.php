<?php

namespace App\Models;

use App\Models\StudentDetails;
use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;

    
    protected $fillable = ['application_id','student_id', 'filename', 'name', 'type'];

    public function application()
    {
        return $this->belongsTo(StudentApplications::class, 'application_id');
    }

    public function student()
    {
        return $this->belongsTo(StudentDetails::class, 'student_id');
    }
}
