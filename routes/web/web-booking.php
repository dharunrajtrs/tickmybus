<?php

/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
| These Routes are common routes
|
 */

/*
 * Temporary dummy route for testing SPA.
 */

Route::namespace ('WebBooking')->group(function () {

// routes/web.php
Route::get('/booking', 'TicketBookingController@bookingView')->name('bookingView');



});