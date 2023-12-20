<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'name',
        'placeholder',
        'type',
        'required'
    ];

    public function Form()
    {
        return $this->belongsTo(\App\Models\Form::class);
    }

    public function Values()
    {
        return $this->hasMany(\App\Models\Value::class);
    }
}
