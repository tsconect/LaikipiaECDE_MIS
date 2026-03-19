<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'causer_id',
        'session_id',
        'ip_address',
        'network',
        'subject_id',
        'model_table_name',
        'action',
        'description',
        'asset_url',
        'current_object',
        'new_object',
        'type',
    ];

    public function causer()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }

    public function subject()
    {
        return $this->morphTo();
    }
}
