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
Auth::routes();

Route::get('/contacts','ContactsController@get');
Route::get('/conversation/{id}','ContactsController@getmessage');
Route::post('/send','ContactsController@send');	
Route::post('/sendfile','ContactsController@sendfile');	
Route::post('/addgroup','ContactsController@addgroup');



