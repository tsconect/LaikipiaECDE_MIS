<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'counties';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'id', 
        'name',
        'code',
    ];

    public function subcounties()
    {
        return $this->hasMany(SubCounty::class);
    }

    public function wards()
    {
        return $this->hasManyThrough(Ward::class, SubCounty::class);
    }
}
