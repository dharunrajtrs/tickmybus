<?php

/*
|--------------------------------------------------------------------------
| User API Routes
|--------------------------------------------------------------------------
|
| These routes are prefixed with 'api/v1'.
| These routes use the root namespace 'App\Http\Controllers\Api\V1'.
|
 */
use App\Base\Constants\Auth\Role;

/*
 * These routes are prefixed with 'api/v1/request'.
 * These routes use the root namespace 'App\Http\Controllers\Api\V1\Request'.
 * These routes use the middleware group 'auth'.
 */ //->middleware('auth')
Route::prefix('journey')->namespace('Journey')->middleware('auth')->group(function () {

    Route::get('list-address', 'AddressController@listAddress');

    Route::get('list-journeys', 'AddressController@listOfJourneys');

    Route::get('single-journey', 'AddressController@singleJourney');

    Route::get('today-journey', 'AddressController@todayJourney');


    Route::get('popular-route', 'AddressController@popularRoutes');


    /*Booking*/  
    Route::get('booking-history', 'AddressController@history'); 

    Route::post('make-booking', 'BookingController@makeBooking'); 

    Route::post('meta-booking', 'BookingController@metaBooking'); 
    
    Route::post('booking-cancel', 'BookingController@cancelTicket'); 


});


Route::prefix('search')->namespace('search')->middleware('auth')->group(function () 
{

    Route::get('search', 'BookingController@search'); 


});
