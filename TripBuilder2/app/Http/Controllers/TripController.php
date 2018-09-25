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
     * route: /api/getAirports
     */
    public function getAirports()
    {
        $airports = Airport::orderBy('name','asc')->get();
        return response()->json($airports);
    }

     /**
     * Returns a list of all trips
     *  route: /api/trips
     *
     */
    public function getTrips()
    {
        Trip::GetAllTrips();
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

        Trip::CreateTrip($name);
     
    }

    /**
     * Deletes a Trip
     * @param  int  Id of trip to be deleted
     * route: /api/trip-delete/{trip_id}
     */
    public function getDeleteTrip($tripId)
    {
        Trip::DeleteTrip($tripId);
    }


    /**
     *Returns specified Trip with its flights
     * @param  int  Id of flight
     * route: /api/trips/{trip_id}
     */
    public function getSingleTrip($trip_id)
    {
       Trip::GetTrip($trip_id); 
    }
    
}