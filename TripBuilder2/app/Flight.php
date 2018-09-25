<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function trip()
    {
        return $this->belongsTo('App\Trip');
    }

    public static function CreateFlight($airport,$tripId)
    {
        $trip = Trip::findOrFail($tripId);
        if($trip)
        {
            $flight = new Flight();
            $flight->airport = $airport ;
            $flight->trip_id = $tripId;
            $flight->save();
            return response()->json(['Status'=>'Success'],200);
        }
        return response()->json(['Status'=>'Fail'],400);
    }

    public static function DeleteFlight($flightId)
    {
        $flight = Flight::where('id',$flightId)->first();
        if($flight)
        {
            $flight->delete();
            return response()->json(['Status'=>'Success'],200);
        }
        return response()->json("Not Found",400);      
    }

    public static function GetAllFlights()
    {
        $flights = Flight::all();
        return response()->json($flights);
    }

    public static function GetFlight($flight_id)
    {
        $flight = Flight::find($flight_id);
        if($flight)
        {
            return response()->json($trip);     
        }
        return response()->json("Not Found",400);
    }
}
