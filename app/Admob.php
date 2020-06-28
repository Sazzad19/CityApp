<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admob extends Model
{
    protected $fillable = [
        'app_id', 'interstitial_id',
        'banner_id', 'native_id', 'image_path', 'url', 'active'
    ];
}
