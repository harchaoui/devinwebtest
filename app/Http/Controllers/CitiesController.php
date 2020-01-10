<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CitiesController extends Controller
{
    //Create store function to add a city(id,name.slug)
    // and handle the api => POST /api/city/
    public function store(Request $request) {
        $res = City::create($request->all());
        if($res){
            return response()->json(
                ['message'=>'City has been added!'],
                200
            );
        }
        return response()->json(['message' => 'Something went wrong'], 500);

    }
}
