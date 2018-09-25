<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| FLIGHT Routes
|--------------------------------------------------------------------------
|
| 
|
*/

Route::post('/addflight',[
    'uses' => 'FlightController@postAddFlight'
]);

Route::get('/flight-delete/{flight_id}',[
    'uses' => 'FlightController@getDeleteFlight'
]);

Route::get('/flights/{flight_id}',[
    'uses' => 'FlightController@getSingleFlight'
]);

Route::get('/flights',[
    'uses' => 'FlightController@getFlights'
]);