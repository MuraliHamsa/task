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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts','ContactsController@get');
Route::get('/groupsss','ContactsController@getgroups');

Route::get('/conversation/{id}','ContactsController@getmessage');
Route::get('/groupconversation/{id}','ContactsController@getgroupmessage');

Route::post('/send','ContactsController@send');	
Route::post('/sendfile','ContactsController@sendfile');	
Route::post('/addgroup','ContactsController@addgroup');


Route::get('/home1', 'HomeController@index1')->name('Home1');

Route::get('/invoice','HomeController@invoice');
Route::POST('/storeInvoice','HomeController@storeInvoice');
Route::POST('/updateinvoice','HomeController@updateinvoice');
Route::get('/downloadTaxInvoice','HomeController@downloadTaxInvoice')->name('downloadTaxInvoice');
