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

Route::get('/categories', 'Api\CategoryController@index');
Route::get('/subcategories', 'Api\SubcategoryController@index');
Route::get('/states', 'Api\StateController@index');
Route::get('/cities', 'Api\CityController@index');
Route::get('/places', 'Api\PlaceController@index');
Route::get('/getplace/{id}', 'Api\PlaceController@getPlace');
Route::get('/getplacesbycategory/{cat_id}', 'Api\PlaceController@getPlacesByCategory');
Route::get('/getplacesbysubcategory/{subcat_id}', 'Api\PlaceController@getPlacesBySubcategory');
Route::get('/getplacesbystate/{state_id}', 'Api\PlaceController@getPlacesByState');
Route::get('/getplacesbycity/{city_id}', 'Api\PlaceController@getPlacesByCity');

