<?php

namespace App\Transformers\Journey;

use App\Models\Admin\Journey;
use App\Transformers\Transformer;
use App\Transformers\Journey\BusTransformer;
use App\Transformers\Journey\JourneyBoardingPointsTransformer;
use App\Transformers\Journey\JourneyStopPointsTransformer;


class FleetAmenityTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = [ ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(fleetAmenity $fleetAmenity)
    {
        return [
            'id' => $fleetAmenity->id,     
        ];
    }

}
