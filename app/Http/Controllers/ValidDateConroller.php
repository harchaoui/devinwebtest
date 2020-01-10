<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExculdedDate;
use App\City;
use App\DeliveryTime;
use Carbon\Carbon;

class ValidDateConroller extends Controller
{
    public function index(Request $request){
        // $this->validate($request,
        // [
            // 'city_id'=>'required',
            // 'number_of_days' => 'required|integer'
        // ]);
        $city_id = $request->city_id;
        
        $city = City::findOrFail($city_id);
        $numberOfDays = $request->number_of_days;

        $day = Carbon::now();

        // $numberOfSpans =  DeliveryTime::where('city_id',$city_id)->count();
        $validSpans = $city->deliveryTimes;
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
        }

        return response()->json(
            ['dates' => $validdays],
            200
        );
    }
}
