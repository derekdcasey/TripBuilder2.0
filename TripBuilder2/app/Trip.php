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
        if($trip->save())
        {
            return 'Success';
        }    
        return 'Fail';
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
        }     
    }

    public static function GetTrip($trip_id)
    {
        $trip = Trip::with('flights')->where('id',$trip_id)->first();
        if($trip)
        {
            return $trip;  
        }  
        return 'Not Found';
    }

    public static function GetAllTrips()
    {
        return Trip::with('flights')->get();    
    }

}
