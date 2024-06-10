<?php

namespace App\Transformers\Journey;

use App\Models\Admin\Journey;
use App\Transformers\Transformer;
use App\Transformers\Journey\BusTransformer;
use App\Transformers\Journey\JourneyBoardingPointsTransformer;
use App\Transformers\Journey\JourneyStopPointsTransformer;
use App\Models\Admin\JourneyPassenger;
use App\Models\Admin\FleetSeatLayout;


class JourneyPassengerTransformer extends Transformer
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
    public function transform(JourneyPassenger $journeyPassenger)
    {
// dd($journeyPassenger->journeyUser->user->mobile);

        return [
            'id' => $journeyPassenger->id,
            'name' => $journeyPassenger->name,
            'gender' =>  $journeyPassenger->gender,
            'age' =>  $journeyPassenger->age,
            'seat_no' =>  $journeyPassenger->fleetSeat->seat_no,
            'journey_user_mobile' => $journeyPassenger->journeyUser->user->mobile,

        ];
    }
 
}
