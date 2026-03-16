<?php

namespace App\Models;

use App\Models\Ward;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCounty extends Model
{
    use HasFactory;

    protected $table = 'sub_counties';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'id', // This is the primary key
        'name',
        'code',
        'county_id',
    ];

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}
