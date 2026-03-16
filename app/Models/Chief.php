<?php

namespace App\Models;

use App\Models\User;
use App\Models\ChiefsReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chief extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'location_id', 'status'];

    /**
     * Get the user that is the chief.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function review()
    {
        return $this->hasOne(ChiefsReview::class, 'application_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    
}
