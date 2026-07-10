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

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'ward_id', 'id');
    }

    public function learners()
    {
        return $this->hasMany(Learner::class, 'ward_id', 'id');
    }

      public function scopeLaikipia($query)
    {
        return $query->whereIn('constituency_id', [
            'RJyUfi5BQUm',
            'pF6qPMIlHte',
            'pXbWrnFPpKb',
        ]);
    }
}
