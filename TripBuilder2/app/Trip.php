<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function flights()
    {
        return $this->hasMany('App\Flight');
    }

    public function CreateTrip($name)
    {      
        $this->name = $name;
        $this->save();
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
