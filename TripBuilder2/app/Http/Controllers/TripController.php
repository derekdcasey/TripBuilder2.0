<?php
namespace App\Http\Controllers;

use App\Flight;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{

       /**
     * Returns a list of all airports, alphabetical order
     * 
     * route: /getAirports
     */
    public function getAirports()
    {
        $airports = Airport::orderBy('name','asc')->get();
        return response()->json($airports);
    }

     /**
     * Returns a list of all trips
     *  route: /trips
     *
     */
    public function getTrips()
    {
        $trips = Trip::GetAllTrips();      
        return response()->json($trips);
    }


    /**
     * Creates a Trip
     * route: /createtrip
     *
     */
    public function postCreateTrip(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|max:50'

        ]);
        
        $name = $request['name'];
        $result = Trip::CreateTrip($name);
        return response()->json($result);
    }

    /**
     * Deletes a Trip
     * @param  int  Id of trip to be deleted
     * route: /trip-delete/{trip_id}
     */
    public function getDeleteTrip($tripId)
    {
       $result = Trip::DeleteTrip($tripId);
       return response()->json($result);
    }


    /**
     *Returns specified Trip with its flights
     * @param  int  Id of flight
     * route: /trips/{trip_id}
     */
    public function getSingleTrip($trip_id)
    {
       $trip = Trip::GetTrip($trip_id); 
       return response()->json($trip);
    }
    
}