<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    function ward()
    {
        # code...
        return $this->hasOne(Wards::class, 'id', 'ward_id');
    }


}
