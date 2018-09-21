<?php
namespace App\Http\Controllers;

use App\Post;
use App\Like;
use App\Flight;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TripController extends Controller
{
    public function getTrips()
    {

        $trips = Trip::orderBy('created_at','desc')->get();
        return view('trips',['trips'=> $trips]);
    }

    public function postCreateTrip(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|max:50'

        ]);

        $trip = new Trip();
        $trip->name =$request['name'];
        $trip->save();
       
        return redirect()->route('trip.view')->with(['id'=> $trip->id]);
    }

    public function getDeleteTrip($tripId)
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
        else
        {
            return response()->json(['Status'=>'Fail'],400);
        }
    }

    public function getDeleteFlight($flightId)
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

    public function getSingleTrip($trip_id)
    {
        $trip = Trip::with('flights')->where('id',$trip_id)->first();
        return response()->json(['Trip'=>$trip],200);
        //return view('flight',['trip'=> $trip]);
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
            $flight = new Flight();
            $flight->airport = $request['airport'];
            $flight->trip_id = $tripId;
            $flight->save();
            return response()->json(['Status'=>'Success'],200);
        }
        else
        {
            return response()->json(['Status'=>'Fail'],400);
        }
        //return redirect()->route('trip.view',['trip_id' =>  $flight->trip_id]);
    }
    

}