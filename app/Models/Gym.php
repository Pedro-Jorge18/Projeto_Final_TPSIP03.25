<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'property_id',
        'capacity',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
