<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('admin.layouts.master');
});
Route::get('/dashboard', function () {
    return view('admin.layouts.master');
});
Route::Resources(['categories' => 'CategoryController']);

Route::get('/subcategory/{cat_id}','SubcategoryController@create')->name('subcategory.create');
Route::Resources(['subcategories' => 'SubcategoryController']);

Route::Resources(['states' => 'StateController']);

Route::get('/city/{state_id}','CityController@create')->name('city.create');
Route::Resources(['cities' => 'CityController']);

Route::Resources(['places' => 'PlaceController']);

Route::get('/subscribers','SubscriberController@index')->name('subscriber.index');


Route::get('/placegallery/{id}', 'PlaceController@placegallery')->name('placegallery'); //AJAX request to get sub categories

Route::post('/getSubcategory', 'SubcategoryController@getSubcategory')->name('getSubcategory'); //AJAX request to get sub categories

Route::post('/getCities', 'CityController@getCities')->name('getCities'); //AJAX request to get cities
