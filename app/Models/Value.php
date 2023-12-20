<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'field_id',
        'value'
    ];

    public function Field()
    {
        return $this->belongsTo(\App\Models\Field::class);
    }

    public function Visitor()
    {
        return $this->belongsTo(\App\Models\Visitor::class);
    }
}
