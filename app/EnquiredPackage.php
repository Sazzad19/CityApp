<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiredPackage extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_number', 'alternate_number', 'start_location',
        'visit_location', 'hotel_type', 'transport_mode', 'travel_mode', 'person_number'
    ];
}
