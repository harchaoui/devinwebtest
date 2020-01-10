<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachCityDeliveryTimeController extends Controller
{
    // create store function to handle attaching city to dl time
    public function store(Request $request){
        // get the ciry_id form the Req param
        $city_id = $req->city;
        
        // Validate the params and require it as an array (json format)
        $this->validate($req, ['delivery_time' => 'required|array']);
        
        // get the delivery_time from the Req param
        $delivery_time = $req->delivery_time;

        // retrieve delivery times from delivery time table
        $times = DeliveryTime::findOrFail($delivery_time);

        // retrieve city
        $city = City::findOrFail($city_id);

        // creates the connection on the (n,n) many-to-many level
        $city->deliveryTimes()->attach($times);

        return response()->json(
            [
                'message' => 'DeliveryTime attached to city'
            ], 
            200);

    }
}
