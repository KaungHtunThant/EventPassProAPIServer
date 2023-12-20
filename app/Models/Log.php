<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'descriptions',
        'http_code',
        'action_status',
        'bookmark',
        'remark'
    ];

    public function User()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
