<?php

namespace App\Transformers;

use App\Models\BoardingPoint;
use App\Models\Admin\JourneyUser;
use App\Transformers\Journey\JourneyUserTransformer;

class BoardingPointsTransformer extends Transformer {
	/**
	 * Resources that can be included if requested.
	 *
	 * @var array
	 */
	protected array $availableIncludes = [	
	];

        protected array $defaultIncludes = [ 'users'
    ];

	/**
	 * A Fractal transformer.
	 *
	 * @param BoardingPoint $boarding_point
	 * @return array
	 */
	public function transform(BoardingPoint $boarding_point) {

        // dd(request()->input('journey_id'));


		 $params = [
			'id' => $boarding_point->id,
			// 'boarding_address' => $boarding_point->boarding_address,
			'landmark' => $boarding_point->landmark,
			'slug' => $boarding_point->slug,
		];

        $boarding_point = $boarding_point->boarding_address;
                    
        $boarding_place = explode (",", $boarding_point); 


        $params['boarding_address'] = $boarding_place[0];

        return $params;
        


	}

     /**
     * Include the Bus of the journeyUser.
     *
     * @param JourneyUser $journeyUser
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeusers(BoardingPoint $boarding_point)
    {

        $journeyUser = JourneyUser::where('journey_id', request()->input('journey_id'))->where('boarding_id', $boarding_point->id)->get();

        return $journeyUser

        ? $this->collection($journeyUser, new JourneyUserTransformer)
        : $this->null();
    }  


	
}
