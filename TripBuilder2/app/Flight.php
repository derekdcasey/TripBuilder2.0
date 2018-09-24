<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function trip(){
        return $this->belongsTo('App\Trip');
    }


    public function CreateFlight($airport,$tripId)
    {
        $this->airport = $airport ;
        $this->trip_id = $tripId;
        $this->save();
    }

    public static function DeleteFlight($flightId)
    {
        $flight = Flight::where('id',$flightId)->first();
        if($flight)
        {
            $flight->delete();
            return response()->json(['Status'=>'Success'],200);
        }
        else
        {
            return response()->json(['Status'=>'Fail'],400);
        }
    }
}
