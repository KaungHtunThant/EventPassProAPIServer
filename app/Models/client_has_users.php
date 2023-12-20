<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_has_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id'
    ];

    public function Client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

    public function User()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
