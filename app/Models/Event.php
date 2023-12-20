<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'name',
        'start_at',
        'end_at',
        'status'
    ];

    public function Client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

    public function Forms()
    {
        return $this->hasMany(\App\Models\Form::class);
    }

    public function Areas()
    {
        return $this->hasMany(\App\Models\Area::class);
    }
}
