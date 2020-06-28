<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\CommentRatting;
use Illuminate\Http\Request;

class CommentRattingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentrattings = CommentRatting::all();
        if ($commentrattings) {

            return response(['success' => true, 'data' => $commentrattings]);
        } else {
            return response(['success' => false]);
        }
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
            'user_id' => 'required|numeric',
            'place_id' => 'required|numeric',
            'ratting' => 'nullable|numeric',
            'comment' => 'required|string'
        ]);
        $commentratting = CommentRatting::create($request->all());
        if ($commentratting) {

            return response(['success' => true, 'data' => $commentratting]);
        } else {
            return response(['success' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommentRatting  $commentRatting
     * @return \Illuminate\Http\Response
     */
    public function show(CommentRatting $commentRatting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommentRatting  $commentRatting
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentRatting $commentRatting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommentRatting  $commentRatting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentRatting $commentRatting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommentRatting  $commentRatting
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentRatting $commentRatting)
    {
        //
    }
}
