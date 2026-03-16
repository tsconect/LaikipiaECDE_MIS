<?php

namespace App\Models;

use App\Models\ChequeTransaction;
use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cheque extends Model
{
    use HasFactory;



    protected $fillable = [
        'cheque_number',
        'amount',
        'contact_person',
        'release_date',
        'balance',
        'school',
        'status',
        'students'
    ];

    

    public function transactions()
    {
        return $this->hasMany(ChequeTransaction::class);
    }
}
