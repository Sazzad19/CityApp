<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'state_id',
    ];
    function state()
    {
        return $this->belongsTo(State::class);
    }
    function places(){
        return $this->hasMany(Place::class);
    }
}
