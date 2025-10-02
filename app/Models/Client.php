<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'nif',
        'birth_date',
    ];
    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }

    public function evaluation()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
