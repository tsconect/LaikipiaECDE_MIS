<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'meta_description', 'featured_image', 'created_by', 'status'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
