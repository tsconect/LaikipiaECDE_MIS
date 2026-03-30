<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(EcdeSchools::class, 'school_id');
    }
}
