<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Handles City(name,slug) POST Req
Route::apiResource('city', 'CitiesController');

// Handles delivery times spans(id, span) POST Req.
Route::apiResource('delivery-times','DeliveryTimesController');

// Handles Attach city delivery times
Route::post('/city/{city}/delivery-times','AttachCityDeliveryTimeController@store');

// Handles excluding some city delivery times
Route::post('/spans/{city_id}/exclude','ExcludeSpansConroller@excludeDateSpans');

// Handles excluding city delivery by excluding all of the daily
// delivery times
Route::post('/delivery-date/{city_id}','ExcludeSpansConroller@excludeDate');