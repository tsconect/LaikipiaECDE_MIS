<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'string'
    ];

    public function subCounty()
    {
        return $this->belongsTo(Constituency::class, 'constituency_code', 'constituency_id');
    }
}
