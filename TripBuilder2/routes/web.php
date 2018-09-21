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
app()->bind('trip', function() {
    return new \App\Trip;
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/test', function () {
    return Trip::getName();
});

Route::post('/createpost',[
    'uses' => 'PostController@postCreatePost',
'as'=>'post.create',
'middleware'=>'auth'
]);

Route::get('/trip-delete/{trip_id}',[
    'uses' => 'TripController@getDeleteTrip',
'as'=>'trip.delete'
]);

Route::get('/trips',[
    'uses' => 'TripController@getTrips',
'as'=>'trips'
]);

Route::post('/createtrip',[
    'uses' => 'TripController@postCreateTrip',
'as'=>'trip.create'
]);

Route::get('/trips/{trip_id}',[
    'uses' => 'TripController@getSingleTrip',
'as'=>'trip.view'
]);

Route::post('/addflight',[
    'uses' => 'TripController@postAddFlight',
'as'=>'flight'
]);