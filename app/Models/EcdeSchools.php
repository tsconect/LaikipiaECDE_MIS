<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcdeSchools extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id', 'county_id');
    }

    public function subCounty()
    {
        return $this->belongsTo(Constituency::class, 'subcounty_id', 'constituency_id');
    }

    public function subLocation()
    {
        return $this->belongsTo(SubLocation::class, 'sub_location_id', 'id');
    }

    
}
