<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.pages.subcategory.list', compact('subcategories'));
    }
    public function getSubcategory(Request $request){
        if($request->ajax()){
          $category_id = $request->cat_id;
          $subcategories = Subcategory::where('category_id', $category_id)->get();
          return response()->json($subcategories);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = Category::find($id);
        return view('admin.pages.subcategory.create', compact('category'));
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
            'cat_id' => 'required|numeric',
        ]);
        $subcategory = Subcategory::create([
            'name' => $request['name'],
            'category_id' => $request['cat_id']
        ]);
        if ($subcategory) {

            return redirect()->back()->with('success', 'Subcategory created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('admin.pages.subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $updatedsubcategory = $subcategory->update([
            'name' => $request['name'],
        ]);
        if ($subcategory) {

            return redirect()->back()->with('success', 'Subcategory updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategorydelete = $subcategory->delete();
       
        if($subcategorydelete) {

            return redirect()->back()->with('success', 'Subcategory Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete');
        }
    }
  
}
