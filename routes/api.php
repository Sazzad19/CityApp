<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

Route::get('/categories', 'Api\CategoryController@index'); //all categories
Route::get('/subcategories', 'Api\SubcategoryController@index');//all subcategories
Route::get('/states', 'Api\StateController@index');//all sates
Route::get('/cities', 'Api\CityController@index');//all cities
Route::get('/places', 'Api\PlaceController@index');//all places
Route::get('/getplace/{id}', 'Api\PlaceController@getPlace'); // one place
Route::get('/getplacesbycategory/{cat_id}', 'Api\PlaceController@getPlacesByCategory');//places by category
Route::get('/getplacesbysubcategory/{subcat_id}', 'Api\PlaceController@getPlacesBySubcategory');//places by subcategory
Route::get('/getplacesbystate/{state_id}', 'Api\PlaceController@getPlacesByState');//places by state
Route::get('/getplacesbycity/{city_id}', 'Api\PlaceController@getPlacesByCity');//places by city
Route::post('/package', 'EnquiredPackageController@store');//create package

Route::middleware('auth:api')->group(function () {
    Route::post('/commentrattings', 'Api\CommentRattingController@store');//create commentrattings
});
Route::get('/commentrattings', 'Api\CommentRattingController@index');//all commentrattings



