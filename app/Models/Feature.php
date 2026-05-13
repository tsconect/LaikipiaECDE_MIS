<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'description',
        'image',
        'icon',
        'icon_color',
        'layout',
        'overlay_title',
        'overlay_description',
        'position',
        'is_active'
    ];
}
