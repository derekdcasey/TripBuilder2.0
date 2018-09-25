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

Route::post('/addflight',[
    'uses' => 'TripController@postAddFlight'
]);

Route::get('/flight-delete/{flight_id}',[
    'uses' => 'TripController@getDeleteFlight'
]);
