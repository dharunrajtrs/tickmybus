<?php

namespace App\Transformers\Journey;

use App\Models\Admin\JourneyUser;
use App\Models\Admin\JourneyPassenger;
use App\Transformers\Transformer;
use App\Transformers\Journey\BusTransformer;
use App\Transformers\Journey\JourneyPassengerTransformer;


class JourneyUserTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
    //  */
    protected array $availableIncludes = ['journeyPassengerDetail'

    ];

    protected array $defaultIncludes = ['journeyPassengerDetail',
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(JourneyUser $journeyUser)
    {
       $params = [
            'journey_id' => $journeyUser->journey_id,
            'user_id'=> $journeyUser->user_id,
            'booking_user_name'=> $journeyUser->user->name,
            'is_cancelled'=> $journeyUser->is_cancelled,
            'is_completed'=> $journeyUser->is_completed,
            'cancelled_at'=> $journeyUser->cancelled_at,
            'cancelled_by'=> $journeyUser->cancelled_by,
            'ticket_number'=> $journeyUser->ticket_number,
            'boarding_id'=> $journeyUser->boarding_id,
            'drop_id'=> $journeyUser->drop_id,
            'boarding_address'=> $journeyUser->boardingPoint->boarding_address,
            'drop_address'=> $journeyUser->dropPoint->boarding_address,
            'is_paid'=> $journeyUser->is_paid,
            'ticket_fare'=> $journeyUser->ticket_fare,
            'travel_duration'=> $journeyUser->journey->duration,
            'departure_time'=> $journeyUser->journey->convertedDepaturedAt(),
            'arraival_time'=> $journeyUser->journey->convertedArrivedAt(),
            'departure_date'=> $journeyUser->journey->convertedDepaturedDateAt(),
            'arraival_date'=> $journeyUser->journey->convertedArrivedDateAt(),
            'from_city'=> $journeyUser->journey->fromCity->city,
            'to_city'=> $journeyUser->journey->toCity->city,  
             'from_city_code'=> $journeyUser->journey->fromCity->short_code,
            'to_city_code'=> $journeyUser->journey->toCity->short_code, 
            'bus_model' =>  $journeyUser->journey->fleet->brand.' '.$journeyUser->journey->fleet->model,
            'company' =>  $journeyUser->journey->fleet->owner->company_name,
            'mobile'=> $journeyUser->user->mobile,  

        ];

        if ($journeyUser->journey->is_completed == false) {
                    if($journeyUser->journey->is_trip_start==0)
                    {
                       $params['is_trip_started'] = false;
                    }else{
                       $params['is_trip_started'] = true;
                    }
        }else{
            $params['is_trip_started'] = false;
        }

        $ticket_user_count = JourneyPassenger::where('ticket_number', $journeyUser->ticket_number)->get();

        $params['passenger_count'] = count($ticket_user_count);



        return $params;
    }
    /**
     * Include the Bus of the journeyUser.
     *
     * @param JourneyUser $journeyUser
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeJourneyPassengerDetail(JourneyUser $journeyUser)
    {
        $journey_passenger  = JourneyPassenger::where('ticket_number', $journeyUser->ticket_number)->get();

        return $journey_passenger

        ? $this->collection($journey_passenger, new JourneyPassengerTransformer)
        : $this->null();
    }  
    /**
     * Include the Bus of the journeyUser.
     *
     * @param JourneyUser $journeyUser
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeRestStops(JourneyUser $journeyUser)
    {

        $restStops  = $journeyUser->journey;

        return $restStops

        ? $this->collection($restStops, new RestStopsTransformer)
        : $this->null();
    }  


}
