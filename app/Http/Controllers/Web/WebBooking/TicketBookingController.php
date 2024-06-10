<?php

namespace App\Http\Controllers\Web\WebBooking;

use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;

class TicketBookingController extends BaseController
{

    public function bookingView()
    {
        // dd("ddd");
        return view('web-booking.welcome');
    }


}
