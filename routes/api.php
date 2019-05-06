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
Route::group(['namespace' => 'Home', 'middleware' => 'auth:api'], function () {
    Route::get('/', "IndexController@home");
    Route::get('/venue/{venue}/detail', "VenueController@venueDetail");
    Route::get('/venue/{venue}/time/list', "VenueController@venueTimeList");
    Route::post('/venue/{venue}/order/create', "OrderController@orderCreate");
    Route::post('/wx/pay/unifiedOrder/{order}', "PayController@unifiedOrder");

});
Route::group(['namespace' => 'Home'], function () {
////    Route::post('/venue/{venue}/order/create', "OrderController@orderCreate");
//    Route::get('/venue/{venue}/detail', "VenueController@venueDetail");
//    Route::get('/venue/{venue}/timeList', "VenueController@venueTimeList");
//    Route::post('/venue/{venue}/order/create', "OrderController@orderCreate");
//    Route::post('/wx/pay/unifiedOrder/{order}', "PayController@unifiedOrder");
});
//Route::get('/', "IndexController@index");
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
