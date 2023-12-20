<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'area_id'
    ];

    public function Area()
    {
        return $this->belongsTo(\App\Models\Area::class);
    }

    public function Visitor()
    {
        return $this->belongsTo(\App\Models\Visitor::class);
    }
}
