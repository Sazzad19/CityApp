<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        return view('admin.pages.state.list', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.state.create');
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
        ]);
        $state = State::create([
            'name' => $request['name']
        ]);
        if ($state) {
            return redirect()->route('states.index')->with('success', 'State created successfully');

        } else {
            return redirect()->back()->with('error', 'Failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);
        return view('admin.pages.state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $state = State::find($id);
        $updatedstate = $state->update([
            'name' => $request['name'],
        ]);
        if ($updatedstate) {

            return redirect()->back()->with('success', 'State updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);
        $statedelete = $state->delete();
       
        if($statedelete) {

            return redirect()->back()->with('success', 'State Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete');
        }
    }
}
