<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Place;
use App\PlaceImage;
use App\State;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view('admin.pages.place.list', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $states = State::all();
        return view('admin.pages.place.create', compact('categories', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'numeric',
            'location' => 'required|string',
            'description' => 'required',
            'phone_number' => 'required|numeric',
            'website' => 'required|string',
            'charges' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,jpeg,png',
            'document' => 'mimes:pdf',
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $place = Place::create($request->all());
        if($request->hasfile('document'))
        {
           
               //$name = time().'.'.$request->file('image')->extension();
               $document = $request->file('document')->store('documents/places');

               $place->update([
                   'document' => $document
               ]);
                     
        }



    
         if($request->hasfile('images'))
         {
            foreach($request->file('images') as $img)
            {
                //$name = time().'.'.$request->file('image')->extension();
                $image = $img->store('images/places');
                $placeimages = PlaceImage::create([
                    'place_id' => $place->id,
                    'image_path' => $image,
                ]);
            }  
        
            
         }
      
         
        
        
        if ($place && $placeimages) {

            return redirect()->route('places.create')->with('success', 'Place created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $place->category_id)->get();
        $states = State::all();
        $cities = City::where('state_id', $place->state_id)->get();

        return view('admin.pages.place.edit', compact('categories', 'states', 'subcategories', 'cities', 'place'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $place = Place::find($id);
        $updatedplace = $place->update([
            'name' => $request['name'],
            'state_id' => $request['state_id'],
            'city_id' => $request['city_id'],
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['subcategory_id'],
            'location' => $request['location'],
            'description' => $request['description'],
            'phone_number' => $request['phone_number'],
            'website' => $request['website'],
            'charges' => $request['charges'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
        ]);

        if($request->hasfile('document'))
        {
            if (Storage::exists($place->document)) {
                Storage::delete($place->document);
            }
           
               //$name = time().'.'.$request->file('image')->extension();
               $document = $request->file('document')->store('documents/places');

               $place->update([
                   'document' => $document
               ]);
                     
        }

        if ($updatedplace) {

            return redirect()->back()->with('success', 'Place updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update');
        }




    }
    public function placegallery($id) {
        $place = Place::find($id);
        $placeimages = PlaceImage::where('place_id', $id)->get();
        return view('admin.pages.place.gallery1', compact('placeimages', 'place'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        $placedelete = $place->delete();
       
        if($placedelete) {

            return redirect()->back()->with('success', 'Place Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete');
        }
    }
}
