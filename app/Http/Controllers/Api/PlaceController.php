<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Place;
use App\PlaceImage;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(){
        return response(['success' => true, 'data' => Place::all()]);
    }
    public function getPlace($id){
        $place = Place::find($id);
        $placeimages = PlaceImage::where('place_id', $place->id)->get();
        return response(['success' => true, 'data' => ['place' => $place, 'images' => $placeimages]]);
    }

    public function getPlacesByCategory($id){
        $places = Place::where('category_id', $id)->get();
        
        return response(['success' => true, 'data' => $places]);
    }
    public function getPlacesBySubcategory($id){
        $places = Place::where('subcategory_id', $id)->get();
        
        return response(['success' => true, 'data' => $places]);
    }

    public function getPlacesByState($id){
        $places = Place::where('state_id', $id)->get();
        
        return response(['success' => true, 'data' => $places]);
    }

    public function getPlacesByCity($id){
        $places = Place::where('city_id', $id)->get();
        
        return response(['success' => true, 'data' => $places]);
    }

}
