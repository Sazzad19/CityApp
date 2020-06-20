<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name'
    ];
    function cities()
    {
        return $this->hasMany(City::class);
    }
}
