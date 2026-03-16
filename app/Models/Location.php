<?php

namespace App\Models;

use App\Models\Ward;
use App\Models\Chief;
use App\Models\County;
use App\Models\SubCounty;
use App\Models\StudentDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'id', 
        'name',
        'ward_id',
    ];

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function subcounty()
    {
        return $this->belongsTo(SubCounty::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function students()
    {
        return $this->hasMany(StudentDetails::class);
    }

    public function chief(){
        return $this->hasOne(Chief::class);
    }
}
