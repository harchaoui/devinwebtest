<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExculdedDate;
use App\City;
use App\DeliveryTime;
use Carbon\Carbon;


class ExcludeSpansConroller extends Controller
{
    // 
    public function excludeDateSpans(Request $request){
        $this->validate($request,[
            "spans" => "required|array",
            "date" => "required|date"
            ]);

        // dd($request->all());

        $city_id = $request->city_id;
        
        
        $city = City::findOrFail($city_id);

        //check spans
        $spans = DeliveryTime::findOrFail($request->spans);

        // 
        $rows = [];
        foreach ($spans as $span) {
            $rows[] = [
                'delivery_time_id' => $span->id,
                'city_id'   =>  $city_id,
                'date'      => $request->date,
                'name'      => Carbon::parse($request->date)->format('l'),
            ];

        }

        $result = ExculdedDate::insert($rows);
        if($result){
            return response()->json(
                ['message'=>'Delivery time has been Excluded form Date!'],
                200
            );
        }
        
        return response()->json(
            ['message' => 'Something went wrong'],
             500
            );


        // dump($city);
        // dd($spans->toArray());
        


    
        
        
        return ;
        
    }
}
