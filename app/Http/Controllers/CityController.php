<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.pages.city.list', compact('cities'));
    }
    public function getCities(Request $request){
        if($request->ajax()){
          $state_id = $request->state_id;
          $cities = City::where('state_id', $state_id)->get();
          return response()->json($cities);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $state = State::find($id);
        return view('admin.pages.city.create', compact('state'));
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
        ]);
        $city = City::create([
            'name' => $request['name'],
            'state_id' => $request['state_id']
        ]);
        if ($city) {

            return redirect()->back()->with('success', 'City created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.pages.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $city = City::find($id);
        $updatedcity = $city->update([
            'name' => $request['name'],
        ]);
        if ($updatedcity) {

            return redirect()->back()->with('success', 'City updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $citydelete = $city->delete();
       
        if($citydelete) {

            return redirect()->back()->with('success', 'City Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete');
        }
    }
    
}
