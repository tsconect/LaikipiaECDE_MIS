<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerAttendance extends Model
{
    use HasFactory;

      protected $fillable = [
        'user_id',
        'learner_id',
        'date',
        'status',
        'reason'
    ];

    public function learner()
    {
        return $this->belongsTo(Learner::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
