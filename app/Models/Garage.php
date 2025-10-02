<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    protected $fillable = [
        'property',
        'cars_capacity',

    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
