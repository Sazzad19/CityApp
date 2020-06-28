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

Route::group(['middleware' => 'auth'], function () {

Route::get('/', function () {
    return view('admin.layouts.master');
});
//dashboard
Route::get('/dashboard', function () {
    return view('admin.layouts.master');
});
//category
Route::Resources(['categories' => 'CategoryController']);

//subcategory
Route::get('/subcategory/{cat_id}','SubcategoryController@create')->name('subcategory.create');
Route::Resources(['subcategories' => 'SubcategoryController']);

//state
Route::Resources(['states' => 'StateController']);

//city
Route::get('/city/{state_id}','CityController@create')->name('city.create');
Route::Resources(['cities' => 'CityController']);

//place
Route::Resources(['places' => 'PlaceController']);
Route::get('/placegallery/{id}', 'PlaceController@placegallery')->name('placegallery');
Route::post('/getsubcategory', 'SubcategoryController@getSubcategory')->name('getSubcategory'); //AJAX request to get sub categories
Route::post('/getcities', 'CityController@getCities')->name('getCities'); //AJAX request to get cities
Route::post('/uploadphoto/{id}', 'PlaceController@uploadPhoto')->name('uploadPhoto'); 
Route::get('/deletephoto/{id}', 'PlaceController@deletePhoto')->name('deletePhoto'); 


//admob
Route::Resources(['admobs' => 'AdmobController']);

Route::get('/turnON/{id}','AdmobController@turnON')->name('admob.turnON');

Route::get('/turnOFF/{id}','AdmobController@turnOFF')->name('admob.turnOFF');

//subscriber
Route::get('/subscribers','SubscriberController@index')->name('subscriber.index');
Route::get('/notification/{id}','SubscriberController@notification')->name('notification.create');

//account
Route::get('/accountform','AccountController@accountform')->name('admin.accountform');
Route::post('/accountupdate/{id}', 'AccountController@accountupdate')->name('admin.accountupdate'); //AJAX request to get cities

//enquired package


Route::Resources(['enquiredpackages' => 'EnquiredPackageController']);

});



Auth::routes();

Route::post('/userlogin', 'LoginController@authenticate')->name('userlogin'); 

Route::get('/home', 'HomeController@index')->name('home');
