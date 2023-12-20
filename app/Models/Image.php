<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url'
    ];

    public function Forms()
    {
        return $this->hasMany(\App\Models\Form::class);
    }
}