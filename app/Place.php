<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'name', 'location', 'phone_number', 'website', 'charges', 'd_name', 'd_specialist', 'd_graduation',
        'description', 'document', 'lng', 'lat', 'subcategory_id', 'category_id',
        'city_id', 'state_id',
    ];
    function images()
    {
        return $this->hasMany(PlaceImage::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    function state()
    {
        return $this->belongsTo(State::class);
    }

    function city()
    {
        return $this->belongsTo(City::class);
    }
    function commentratting(){
        //return $this->hasMany(CommentRatting::class);
    }

   



}
