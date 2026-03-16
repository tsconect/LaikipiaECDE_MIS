<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'application_id',
        'dully_filled_and_signed',
        'supportive_documents_attached',
        'approval',
        'percentage',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function application()
    {
        return $this->belongsTo(StudentApplications::class, 'application_id');
    }
}
