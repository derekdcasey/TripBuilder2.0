<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| TRIP Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/getAirports',[
    'uses' => 'TripController@getAirports'
]);


Route::get('/trip-delete/{trip_id}',[
    'uses' => 'TripController@getDeleteTrip'
]);

Route::get('/trips',[
    'uses' => 'TripController@getTrips'
]);

Route::post('/createtrip',[
    'uses' => 'TripController@postCreateTrip'
]);

Route::get('/trips/{trip_id}',[
    'uses' => 'TripController@getSingleTrip'
]);
