<?php

namespace App\Http\Controllers\Api;

use App\City;
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
        $category = $place->category;
        $subcategory = $place->subcategory;
        $state = $place->state;
        $city = $place->city;
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
       /*$city = City::find($id);
       if($city){
           $places = $city->places;
           if ($places) {

            return response(['success' => true, 'data' => $places]);
        } else {
            return response(['success' => false, 'data' => 'No Place']);
        }
       }
       else{
        return response(['success' => false, 'data' => 'Invalid City']);
       }*/

       return response(['success' => true, 'data' => $places]);
    }
   

}
