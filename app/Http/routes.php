<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::auth();

//Route::get('/', 'HomeController@check2')->guard('admin');
Route::get('/', [
    'middleware' => 'auth:admin',
    'uses' => 'HomeController@check2'
]);

Route::get('home', 'HomeController@home');
Route::get('home2', 'HomeController@home2');



Route::get('admin/login', 'Admin\AuthController@showLoginForm');
Route::post('admin/login', 'Admin\AuthController@login');
Route::get('admin/logout', 'Admin\AuthController@logout');
//Route::get('admin/register', 'Admin\AuthController@showRegistrationForm');
Route::post('admin/register', 'Admin\AuthController@register');


Route::get('index', 'HomeController@index');
Route::get('check2', 'HomeController@check2');
Route::get('info', 'HomeController@info');
Route::get('buildingList', 'HomeController@buildingList');

Route::get('sidebar', 'HomeController@sidebar');

Route::resource('library', 'LibraryController');
Route::resource('libraryinfos', 'LibraryController@libraryinfos');
Route::resource('instrument', 'InstrumentController');
Route::resource('furniture', 'FurnitureController');

Route::resource('cse', 'CseController');
Route::resource('eee', 'EeeController');
Route::resource('ce', 'CeController');
Route::resource('lb', 'LbController');
Route::resource('ad', 'AdController');

Route::resource('bus', 'BusController');
Route::resource('room', 'RoomController');

Route::resource('busbook', 'BusbookController');
Route::resource('roombook', 'RoombookController');

Route::get('cseinfo', ['as' => 'cseinfo', 'middleware' => 'auth:admin','uses' => 'CseController@cseinfo']);
Route::get('eeeinfo', ['as' => 'eeeinfo', 'middleware' => 'auth:admin','uses' => 'EeeController@eeeinfo']);
Route::get('ceinfo', ['as' => 'ceinfo', 'middleware' => 'auth:admin','uses' => 'CeController@ceinfo']);
Route::get('lbinfo', ['as' => 'lbinfo', 'middleware' => 'auth:admin','uses' => 'LbController@lbinfo']);
Route::get('adinfo', ['as' => 'adinfo', 'middleware' => 'auth:admin','uses' => 'AdController@adinfo']);

Route::get('instrumentinfo', ['as' => 'instrumentinfo', 'uses' => 'InstrumentController@instrumentinfo']);

Route::get('furnitureinfo', 'FurnitureController@furnitureinfo');
Route::get('businfo',['as' =>'businfo', 'uses'=> 'BusController@businfo']);
Route::get('busbookinfo', ['as' => 'busbookinfo', 'uses' => 'BusbookController@busbookinfo']);
Route::get('roominfo', ['as' => 'roominfo', 'uses' => 'RoomController@roominfo']);
Route::get('roombookinfo', ['as' => 'roombookinfo', 'uses' => 'RoombookController@roombookinfo']);



Route::get('libraryinfo', ['as' => 'libraryinfo', 'uses' => 'LibraryController@libraryinfo']);
Route::post('/librarysearch', 'LibraryController@librarysearch');





//Cse add
Route::get('add/cse/{type}/{id}', 'CseController@addcse');
Route::post('add/cse', 'CseController@addtocse');
//Cse furniture and instrument
Route::get('cse/show/{id}', 'CseController@showcse');

//Ce add
Route::get('add/ce/{type}/{id}', 'CeController@addce');
Route::post('add/ce', 'CeController@addtoce');
//Ce furniture and instrument
Route::get('ce/show/{id}', 'CeController@showce');


//Eee add
Route::get('add/eee/{type}/{id}', 'EeeController@addeee');
Route::post('add/eee', 'EeeController@addtoeee');
//Eee furniture and instrument
Route::get('eee/show/{id}', 'EeeController@showeee');

// Furniture
Route::get('furniture/{name}/{id}', 'FurnitureController@furniture');
// Instrument
Route::get('instrument/{name}/{id}', 'InstrumentController@instrument');


// Room Booking
Route::post('roomsearch', 'RoomController@roomsearch');
Route::get('roomsearch', 'RoomController@rooms');
Route::get('roomconfirm/{id}', 'RoombookController@bookconfirm')->middleware('auth');
Route::get('booked', 'HomeController@showmsgs')->middleware('auth');


//Bus Booking
Route::post('bussearch', 'BusController@bussearch');
Route::get('bussearch', 'BusController@buses');
Route::get('bookconfirm/{id}', 'BusbookController@bookconfirm')->middleware('auth');
Route::get('booked', 'HomeController@showmsgs')->middleware('auth');


