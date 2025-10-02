<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $fillable = [
        'property_id',
        'covered',
        'heart',
    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
