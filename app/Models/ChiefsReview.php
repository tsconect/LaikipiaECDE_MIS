<?php

namespace App\Models;

use App\Models\Chief;
use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChiefsReview extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'percentage', 'remark', 'chiefs_id', 'application_id'];

    public function chief()
    {
        return $this->belongsTo(Chief::class, 'chiefs_id');
    }

    public function application()
    {
        return $this->belongsTo(StudentApplications::class, 'application_id');
    }
}
