<?php

namespace App\Transformers\Journey;

use App\Models\Admin\Journey;
use App\Transformers\Transformer;
use App\Transformers\Journey\BusTransformer;
use App\Transformers\Journey\JourneyBoardingPointsTransformer;
use App\Transformers\Journey\JourneyStopPointsTransformer;
use App\Models\Admin\Fleet;
use App\Models\Admin\JourneyPassenger;
use Carbon\Carbon;
use DateTime;

class JourneyTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = ['bus','boardingpoints','stoppoints'

    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Journey $journey)
    {
       $params = [
            'id' => $journey->id,
            'service_location_id' => $journey->service_location_id,
            'fleet_id' => $journey->fleet_id,
            'is_completed' => $journey->is_completed,
            'completed_at' => $journey->completed_at,
            'is_trip_start' =>  $journey->is_trip_start,
            'started_at' =>  $journey->started_at,
            'depature_at' =>  $journey->depature_at,
            'arrived_at' =>  $journey->arrived_at,
            'depature_at_date' =>  Carbon::createFromFormat('Y-m-d H:i:s',$journey->depature_at)->toDateString(),
            'arrived_at_date' =>  Carbon::createFromFormat('Y-m-d H:i:s',$journey->arrived_at)->toDateString(),
            'depature_at_time' =>  Carbon::createFromFormat('Y-m-d H:i:s',$journey->depature_at)->format('H:i'),
            'arrived_at_time' =>  Carbon::createFromFormat('Y-m-d H:i:s',$journey->arrived_at)->format('H:i'),
            'seater_price' =>  $journey->seater_price,
            'sleeper_price' =>  $journey->sleeper_price,
            'semi_sleeper_price' =>  $journey->semi_sleeper_price,
             'upper_seater_price' =>  $journey->upper_seater_price,
            'upper_sleeper_price' =>  $journey->upper_sleeper_price,
            'upper_semi_sleeper_price' =>  $journey->upper_semi_sleeper_price,
            'from_city_id' =>  $journey->from_city_id,
            'to_city_id' =>  $journey->to_city_id,
            //  'from_city' =>  $journey->fromCity->city,
            //  'to_city' =>  $journey->toCity->city,
            'bus_company_name' => $journey->fleet->owner->company_name,
            'rating' => '5',
            'available_seats' =>(($journey->fleet->total_seats)-(count($journey->journeyUser))),
           // 'currency_symbol' => $journey->serviceLocation->currency_symbol,
            'duration' => $journey->duration,
            'low_price' => $journey->getLowPrice(),
        ];


        if ($journey->is_completed == false) {
            $params['is_trip_started'] = $journey->is_trip_start;
        }else{
            $params['is_trip_started'] = false;
        }


    if (auth()->check()) { //check auth user has role

        if (auth()->user()->hasRole('driver'))
        {

        $boardingpoints = $journey->journeyBoardingPoint()->count();
        $stoppoints = $journey->journeyStopPoint()->count();

        $today =  Carbon::now();
        $depature_at =Carbon::createFromFormat('Y-m-d H:i:s',$journey->depature_at);

        $date = $today->diff($depature_at);

        // dd($journey->driver->user->timezone);

        if ($date->d != 0)
        {
        $params['difference_in_days'] =  $date->d;
        }elseif ($date->h != 0) {
        $params['difference_in_hours'] =  $date->h;
        }elseif ($date->i != 0) {
        $params['difference_in_minutes'] =  $date->h;
        }

        $params['from_city_code'] =  $journey->fromCity->short_code;
        $params['to_city_code'] =  $journey->toCity->short_code;
        $params['number_of_stops'] = $boardingpoints + $stoppoints;
        $params['number_of_passengers'] = JourneyPassenger::where('journey_id', $journey->id)->count();

        }
    }


        $params['maximum_number_of_seats_user_can_book'] = get_settings('maximum_number_of_seats_user_can_book');

        $fleet = Fleet::whereId($journey->fleet_id)->first();

        $deck_type = $fleet->fleetSeatLayout()->where('deck_type', 'upper')->exists();

        if($deck_type == true)
        {
            $params['upper_deck_available']=true;
        }else
        {
            $params['upper_deck_available']=false;
        }



        return $params;


    }
    /**
     * Include the Bus of the user.
     *
     * @param User $user
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeBus(Journey $journey)
    {
        $bus = $journey->fleet;
        // $bus->journey_id = $journey->id;
        return $bus
        ? $this->item($bus, new BusTransformer)
        : $this->null();
    }

    public function includeBoardingpoints(Journey $journey)
    {
        $boardingpoints = $journey->journeyBoardingPoint;

        return $boardingpoints
        ? $this->collection($boardingpoints, new JourneyBoardingPointsTransformer)
        : $this->null();

    }
    public function includeStoppoints(Journey $journey)
    {
        $stoppoints = $journey->journeyStopPoint;

        return $stoppoints
        ? $this->collection($stoppoints, new JourneyStopPointsTransformer)
        : $this->null();

    }
}
