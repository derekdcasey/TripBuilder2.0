<?php
namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{

    /**
     *Returns All Flights
     * 
     * route: /addflight
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

        $result = Flight::CreateFlight($airport, $tripId);
        return response()->json($result);
    }

    /**
     *Returns All Flights
     *  route: /flights
     *
     */
    public function getFlights()
    {
        $flights = Flight::GetAllFlights();
        return response()->json($flights);
    }

    /**
     * Deletes a Flight
     * @param  int  Id of flight to be deleted
     * route: /flight-delete/{flight_id}
     */
    public function getDeleteFlight($flight_id)
    {
        $result = Flight::DeleteFlight($flight_id);
        return response()->json($result);
    }

     /**
     *Returns specified Trip with its flights
     * @param  int  Id of flight
     * route: /flights/{flight_id}
     */
    public function getSingleFlight($flight_id)
    {
        $flight = Flight::GetFlight($flight_id);
        return response()->json($flight);
    }
}