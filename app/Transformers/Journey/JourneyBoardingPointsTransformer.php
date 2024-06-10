<?php

namespace App\Transformers\Journey;

use App\Models\Admin\JourneyBoardingPoint;
use App\Transformers\Transformer;
use App\Transformers\Journey\BusTransformer;
use App\Models\Admin\JourneyUser;

class JourneyBoardingPointsTransformer extends Transformer
{

        protected array $defaultIncludes = [ 'users'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(JourneyBoardingPoint $JourneyBoardingPoint)
    {
        // dd(request()->input('journey_id'));
        $params = [
            'boarding_id'=>$JourneyBoardingPoint->boarding_id,
            'boarding_time'=>$JourneyBoardingPoint->getBoardingAttribute(),

        ];

        $boarding_point = $JourneyBoardingPoint->boardingPoint->boarding_address;
                    
        $boarding_place = explode (",", $boarding_point); 


        $params['boarding_place'] = $boarding_place[0];


        $journey_detail = $JourneyBoardingPoint->journey()->where('is_trip_start', true)->first();



        if($journey_detail != null)
        {
            if($journey_detail->is_completed=true)
            {
                 $params['is_trip_started']=false;

            }else{
                $params['is_trip_started']=true;

            }

        }else
        {
                $params['is_trip_started']=false;
        }


        return $params;

    }
 
      /**
     * Include the Bus of the journeyUser.
     *
     * @param JourneyUser $journeyUser
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeusers(JourneyBoardingPoint $JourneyBoardingPoint)
    {

        $journeyUser = JourneyUser::where('journey_id', $JourneyBoardingPoint->journey_id)->where('boarding_id', $JourneyBoardingPoint->boarding_id)->get();

        return $journeyUser

        ? $this->collection($journeyUser, new JourneyUserTransformer)
        : $this->null();
    }  


}
