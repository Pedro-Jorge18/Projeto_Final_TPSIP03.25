<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\PropertyFactory> */
    use HasFactory;

    public function owners(){
        return $this->belongsTo(Owner::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function photos()
    {
        return $this->hasMany(PropPhoto::class);
    }
}
