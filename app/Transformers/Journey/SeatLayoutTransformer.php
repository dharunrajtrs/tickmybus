<?php

namespace App\Transformers\Journey;

use App\Models\Admin\FleetSeatLayout;
use App\Transformers\Transformer;
use App\Models\Admin\MetaBooking;
use App\Models\Admin\JourneyPassenger;


class SeatLayoutTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = [

    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(FleetSeatLayout $fleetSeatLayout)
    {
        $journey_id=request()->journey_id;

        $params = [
            'id' => $fleetSeatLayout->id,
            'fleet_id' => $fleetSeatLayout->fleet_id,
            'position' => $fleetSeatLayout->position,
            'seat_no' => $fleetSeatLayout->seat_no,
            'seat_type' => $fleetSeatLayout->seat_type,
            'deck_type' =>  $fleetSeatLayout->deck_type,
            'no_seat'=>$fleetSeatLayout->no_seat,
            'is_available'=>true,
            'booked_by_female'=>false
        ];


        $journey_passenger = JourneyPassenger::where('journey_id',$journey_id)->where('seat_id',$fleetSeatLayout->id)->first();


        if($journey_passenger){
            $params['is_available']=false;

            if($journey_passenger->gender=='female'){

                $params['booked_by_female']=true;
            }
        }
        $booking_meta_exists = MetaBooking::where('journey_id', $journey_id)->where('seat_id', $fleetSeatLayout->id)->exists();
// dd($booking_meta_exists);
        if ($booking_meta_exists == true) 
        {
            $params['is_available']=false;
        }


        return $params;
    }
}
