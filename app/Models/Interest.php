<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'form_id',
        'name'
    ];

    public function Visitor()
    {
        return $this->belongsTo(\App\Models\Visitor::class);
    }

    public function Form()
    {
        return $this->belongsTo(\App\Models\Form::class);
    }
}
