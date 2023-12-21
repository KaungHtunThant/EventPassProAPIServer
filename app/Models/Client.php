<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'status'
    ];

    public function Events()
    {
        return $this->hasMany(\App\Models\Event::class);
    }

    public function HasUsers()
    {
        return $this->hasMany(\App\Models\client_has_users::class);
    }
}
