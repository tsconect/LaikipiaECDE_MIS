<?php

namespace App\Models;

use App\Models\StudentApplications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BursaryApplications extends Model
{
    use HasFactory;
    
  public function studentApplications()
    {
        return $this->hasMany(StudentApplications::class, 'bursary_id', 'id');
    }

  
}
