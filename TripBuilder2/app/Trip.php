<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function flights()
    {
        return $this->hasMany('App\Flight');
    }

    public static function CreateTrip($name)
    {      
        $trip = new Trip();
        $trip->name = $name;
        $trip->save();
        return response()->json(['Status'=>'Success'],200);
    }

    public static function DeleteTrip($tripId)
    {
       
        $trip = Trip::where('id',$tripId)->first();
        if($trip)
        {
            foreach($trip->flights as $f)
            {
                $f->delete();
            }
            $trip->delete();
            return response()->json(['Status'=>'Success'],200);
        }
        return response()->json("Not Found",400);
    }

    public static function GetTrip($trip_id)
    {
        $trip = Trip::with('flights')->where('id',$trip_id)->first();
        if($trip)
        {
            return response()->json($trip);   
        }  
        return response()->json("Not Found",400);
    }

    public static function GetAllTrips()
    {
        $trips = Trip::with('flights')->get();
        return response()->json($trips);
    }

}
