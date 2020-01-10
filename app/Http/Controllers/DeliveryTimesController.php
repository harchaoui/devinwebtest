<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryTime;

class DeliveryTimesController extends Controller
{
    //Create the store function to add a deliverytime (id,span)
    //handles the POST => api/delivery-times
    public function store(Request $request){
        
        // Perform validation on $req params
        $this->validate($request,['span'=>'required']);

        // try to insert data into city table
        $result = DeliveryTime::create($request->all());
        
        // Perfom a check on returned data, No Exception is handled!
         if($result){
            return response()->json(
                ['message'=>'Delivery time has been added!'],
                200
            );
        }
        
        return response()->json(
            ['message' => 'Something went wrong'],
             500
            );
        


    }
}
