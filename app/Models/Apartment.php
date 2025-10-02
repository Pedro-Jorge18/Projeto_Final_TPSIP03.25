<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'property_id',
        'address',
        'postal_code',
        'city',
        'state',
        'bedrooms',
        'bathrooms',
        'double_beds',
        'single_beds',
        'both_beds',
        'animal',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
