<?php

namespace App\Http\Controllers;

use App\EnquiredPackage;
use Illuminate\Http\Request;

class EnquiredPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiredpackages = EnquiredPackage::all();
        return view('admin.pages.enquiredpackage.list', compact('enquiredpackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone_number' => 'required|string',
            'start_location' => 'required|string',
            'visit_location' => 'required|string',
            'hotel_type' => 'required|string',
            'transport_mode' => 'required|string',
            'travel_mode' => 'required|string',
            'person_number' => 'required|numeric'
        ]);
        $enquiredpackage = EnquiredPackage::create($request->all());
        if($enquiredpackage){
            return response(['success' => true, 'data' => $enquiredpackage]);
        }
        else{
            return response(['success' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EnquiredPackage  $enquiredPackage
     * @return \Illuminate\Http\Response
     */
    public function show(EnquiredPackage $enquiredPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EnquiredPackage  $enquiredPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(EnquiredPackage $enquiredPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EnquiredPackage  $enquiredPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnquiredPackage $enquiredPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EnquiredPackage  $enquiredPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquiredPackage = EnquiredPackage::find($id);
        $enquiredPackagedelete = $enquiredPackage->delete();
        if($enquiredPackagedelete) {

            return redirect()->back()->with('success', 'Enquired Package deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete');
        }
    }
}
