<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id'
    ];

    public function User()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function Area()
    {
        return $this->belongsTo(\App\Models\Area::class);
    }
}
