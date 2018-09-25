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

    }
}
