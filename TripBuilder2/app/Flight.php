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
            if($flight->save())
            {
                return ['Status'=>'Success'];
            }
            else
            {
                return ['Status'=>'Fail'];      
            }            
        }       
    }

    public static function DeleteFlight($flightId)
    {
        $flight = Flight::where('id',$flightId)->first();
        if($flight)
        {
            $flight->delete();
        }   
    }

    public static function GetAllFlights()
    {
        return Flight::all();       
    }

    public static function GetFlight($flight_id)
    {
        $flight = Flight::find($flight_id);       
        if($flight)
        {
            return $flight;     
        }
        return "Not Found";
    }
}
