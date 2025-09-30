<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\PropPhotoFactory> */
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
