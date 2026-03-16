<?php

namespace App\Models;

use App\Models\County;
use App\Models\SubCounty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'id', // This is the primary key
        'name',
        'code',
        'sub_county_id',
    ];

    public function sub_county()
    {
        return $this->belongsTo(SubCounty::class);
    }

    public function county()
    {
        return $this->belongsToThrough(County::class, SubCounty::class);
    }
}
