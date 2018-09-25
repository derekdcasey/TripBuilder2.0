<?php
namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{

    /**
     *Returns All Flights
     * 
     * route: /api/addflight
     *
     */
    public function postAddFlight(Request $request)
    {
        //Validate the request
        $this->validate($request,[
            'airport' => 'required|max:50',
            'trip_id'=>'required'
        ]);

        $airport = $request['airport'];
        $tripId = $request['trip_id'];

        Flight::CreateFlight($airport, $tripId);
    }

    /**
     *Returns All Flights
     *  route: /api/flights
     *
     */
    public function getFlights()
    {
        Flight::GetAllFlights();
    }

    /**
     * Deletes a Flight
     * @param  int  Id of flight to be deleted
     * route: /api/flight-delete/{flight_id}
     */
    public function getDeleteFlight($flight_id)
    {
        Flight::DeleteFlight($flight_id);
    }

     /**
     *Returns specified Trip with its flights
     * @param  int  Id of flight
     * route: /api/flights/{flight_id}
     */
    public function getSingleFlight($flight_id)
    {
        Flight::GetFlight($flight_id);
    }
}