<?php

namespace App\Http\Controllers;

use App\Admob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admobs = Admob::all();
        return view('admin.pages.admob.list', compact('admobs'));
    }
    public function turnON($id) {
        $admob = Admob::find($id);
         $admobON = $admob ->update([
            'active' => 1,
        ]);

        if ($admobON) {

            return redirect()->back()->with('success', 'Turned ON successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to ON');
        }


    }

    public function turnOFF($id) {
        $admob = Admob::find($id);
         $admobOFF = $admob ->update([
            'active' => 0,
        ]);

        if ($admobOFF) {

            return redirect()-back()->with('success', 'Turned OFF successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to OFF');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.admob.create');
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
            'app_id' => 'required|string',
        ]);
        $admob = Admob::create($request->all());

        if($request->hasfile('image'))
        {
           
               //$name = time().'.'.$request->file('image')->extension();
               $image = $request->file('image')->store('images/admobs');

               $admob->update([
                   'image_path' => $image
               ]);
                     
        }

        if ($admob) {

            return redirect()->route('admobs.index')->with('success', 'Admob created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admob  $admob
     * @return \Illuminate\Http\Response
     */
    public function show(Admob $admob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admob  $admob
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admob = Admob::find($id);
        return view('admin.pages.admob.edit', compact('admob'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admob  $admob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'app_id' => 'required|string',
        ]);

        $admob = Admob::find($id);

        if($request->hasfile('image'))
        {
            if (Storage::exists($admob->image_path)) {
                Storage::delete($admob->image_path);
            }
           
               //$name = time().'.'.$request->file('image')->extension();
               $image = $request->file('image')->store('images/admobs');

               
                     
        }

        
        $updatedadmob = $admob->update([
            'app_id' => $request['app_id'],
            'interstitial_id' => $request['interstitial_id'],
            'banner_id' => $request['banner_id'],
            'native_id' => $request['native_id'],
            'image_path' => $image,
            'url' => $request['url'],
            'active' => $request['active'],


        ]);

        if ($updatedadmob) {

            return redirect()->back()->with('success', 'Admob updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admob  $admob
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admob = Admob::find($id);

        if (Storage::exists($admob->image_path)) {
            Storage::delete($admob->image_path);
        }
        $admobdelete = $admob->delete();

       
        if($admobdelete) {

            return redirect()->back()->with('success', 'Admob deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete');
        }
    }
}
