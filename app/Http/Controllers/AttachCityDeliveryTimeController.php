<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryTime;
use App\City;


class AttachCityDeliveryTimeController extends Controller
{
    // create store function to handle attaching city to dl time
    public function store(Request $request){
        // get the ciry_id form the Req param
        $city_id = $request->city;
        // dump($request->all());
        
        // Validate the params and require it as an array (json format)
        $this->validate($request, ['delivery_time' => 'required|array']);

        // get the delivery_time from the Req param
        $delivery_time = $request->delivery_time;

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
