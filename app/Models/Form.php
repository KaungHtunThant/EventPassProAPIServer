<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'image_id',
        'name',
        'status',
        'expires_at'
    ];

    public function Event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    public function Image()
    {
        return $this->belongsTo(\App\Models\Image::class);
    }

    public function Fields()
    {
        return $this->hasMany(\App\Models\Field::class);
    }

    public function Interests()
    {
        return $this->hasMany(\App\Models\Interest::class);
    }

    public function Visitor()
    {
        return $this->hasMany(\App\Models\Visitor::class);
    }
}
