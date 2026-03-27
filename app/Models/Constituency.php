<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    use HasFactory;

    public function county()
    {
        return $this->belongsTo(County::class, 'county_code', 'county_id');
    }
}
