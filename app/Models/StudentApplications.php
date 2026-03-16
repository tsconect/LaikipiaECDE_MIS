<?php

namespace App\Models;

use App\Models\Cheque;
use App\Models\Attachment;
use App\Models\ChiefsReview;
use App\Models\SchoolDetails;
use App\Models\StudentDetails;
use App\Models\StudentParents;
use App\Models\CommitteeReview;
use App\Models\ChequeTransaction;
use App\Models\BursaryApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentApplications extends Model
{
    use HasFactory;

    protected $fillable = [
     
        'status'
    ];
    
    public function student()
    {
        return $this->belongsTo(StudentDetails::class);
    }

    public function bursary()
    {
        return $this->belongsTo(BursaryApplications::class);
    }
    public function parent()
    {
        return $this->belongsTo(StudentParents::class);
    }

    public function chiefsReviews()
    {
        return $this->hasOne(ChiefsReview::class, 'application_id');
    }
    
   
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'application_id');
    }
    
    public function committeeReviews()
    {
        return $this->hasOne(CommitteeReview::class, 'application_id');
    }
    public function cheques()
    {
        return $this->hasOne(Cheque::class, 'application_id', 'id');
    }

    public function transactions()
    {
        return $this->hasOne(ChequeTransaction::class, 'application_id', 'id');
    }

}
