<?php
namespace App\Http\Controllers;

use App\Flight;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TripController extends Controller
{
     /**
     * Returns a list of all trips
     * 
     *
     */
    public function getTrips()
    {
        $trips = Trip::with('flights')->get();
        return response()->json($trips);
    }

    /**
     * Returns a list of all airports, alphabetical order
     * 
     *
     */
    public function getAirports()
    {
        $airports = Airport::orderBy('name','asc')->get();
        return response()->json($airports);
    }

    /**
     * Creates a Trip
     * 
     *
     */
    public function postCreateTrip(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|max:50'

        ]);

        Trip::CreateTrip($request['name']);
        return response()->json(['Status'=>'Success'],200);
      
    }

    /**
     * Deletes a Trip
     * @param  int  Id of trip to be deleted
     *
     */
    public function getDeleteTrip($tripId)
    {
        Trip::DeleteTrip($tripId);
    }

    /**
     * Deletes a Flight
     * @param  int  Id of flight to be deleted
     *
     */
    public function getDeleteFlight($flight_id)
    {
        Flight::DeleteFlight($flight_id);
    }

    /**
     *Returns specified Trip with its flights
     * @param  int  Id of flight
     *
     */
    public function getSingleTrip($trip_id)
    {
        $trip = Trip::with('flights')->where('id',$trip_id)->first();
        return response()->json($trip);     
    }
    
    public function postAddFlight(Request $request)
    {
        //Validate the request
        $this->validate($request,[
            'airport' => 'required|max:50'
        ]);
        
        $trip = Trip::find($request['trip_id']);

        if($trip)
        {
            Flight::CreateFlight($request['airport'],$trip->id);
            return response()->json(['Status'=>'Success'],200);
        }
        else
        {
            return response()->json(['Status'=>'Fail'],400);
        }
        
    }

    /**
     *Returns All Flights
     * 
     *
     */
    public function getFlights()
    {
        $flights = Flight::all();
        return response()->json($flights);
    }

}