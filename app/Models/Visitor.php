<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'form_id'
    ];

    public function Form()
    {
        return $this->belongsTo(\App\Models\Form::class);
    }

    public function Attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class);
    }

    public function Interests()
    {
        return $this->hasMany(\App\Models\Interest::class);
    }

    public function Values()
    {
        return $this->hasMany(\App\Models\Value::class);
    }
}
