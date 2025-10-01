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

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'property_id', 'user_id')->withTimestamps();
    }

    public function house()
    {
        return $this->hasOne(House::class);
    }

    public function apartment()
    {
        return $this->hasOne(Apartment::class);
    }
    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function pool()
    {
        return $this->hasOne(Pool::class);
    }
    public function sauna()
    {
        return $this->hasOne(Sauna::class);
    }

    public function gym()
    {
        return $this->hasOne(Gym::class);
    }

    public function garage()
    {
        return $this->hasOne(Garage::class);
    }
}
