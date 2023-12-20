<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_id'
    ];

    public function Event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    public function Attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class);
    }
    
    public function Duties()
    {
        return $this->hasMany(\App\Models\Duty::class);
    }
}
