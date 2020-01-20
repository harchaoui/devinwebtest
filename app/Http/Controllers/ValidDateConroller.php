<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExculdedDate;
use App\City;
use App\DeliveryTime;
use Carbon\Carbon;

class ValidDateConroller extends Controller
{
    // {
    // 	"city_id":2,
    // 	"number_of_days": 2     
    // }

    public function index(Request $request){
        $this->validate($request,
        [
            'city_id'=>'required',
            'number_of_days' => 'required|integer'
        ]);
        
        // Get the city_id from the Request
        $city_id = $request->city_id;
        
        // Get the list of cities from DB
        $city = City::findOrFail($city_id);

        // Get the number of days from Req.
        $numberOfDays = $request->number_of_days;

        // Use Carbon to get today date. format (dd-mm-yyyy)-> 'd-m-Y'
        $day = Carbon::now();

        // $numberOfSpans =  DeliveryTime::where('city_id',$city_id)->count();
        
        // get valid spans from cities
        $validSpans = $city->deliveryTimes;
        
        // get the number of valid spans 
        $numberOfSpans =  $validSpans->count();

        
        $validdays = [];
        for ($i = 0; $i < $numberOfDays;$i++){
            
            $spansFromExDate= ExculdedDate::where('date',$day->format('d-m-Y'))->where('city_id',$city_id)->count();
            
            if ($spansFromExDate != $numberOfSpans){
                $validdays[] = [
                    'date' => $day->format('d-m-Y'),
                    'name' => $day->format('l'),
                    'delivery_times' => $validSpans->toArray()
                ];
            }
            $day = $day->addDays(1);
            // dd($day);
        }

        return response()->json(
            ['dates' => $validdays],
            200
        );
    }
}
