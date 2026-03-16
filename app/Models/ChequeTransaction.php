<?php

namespace App\Models;

use App\Models\Cheque;
use App\Models\StudentDetails;
use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChequeTransaction extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'transaction_type',
        'application_id',
        'cheque_id',
        'amount',
        'balance',
    ];

    public function cheque()
    {
        return $this->belongsTo(Cheque::class);
    }

    public function studentApplication()
    {
        return $this->belongsTo(StudentApplications::class, 'application_id', 'id');
    }

}
