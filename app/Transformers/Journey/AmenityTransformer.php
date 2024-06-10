<?php

namespace App\Transformers\Journey;

use App\Models\Amenity;
use App\Transformers\Transformer;
use App\Transformers\Journey\BusTransformer;
use App\Transformers\Journey\JourneyBoardingPointsTransformer;
use App\Transformers\Journey\JourneyStopPointsTransformer;


class AmenityTransformer extends Transformer
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
    public function transform(Amenity $amenity)
    {
        return [
            'id' => $amenity->id,   
            'name' => $amenity->name,  
            'icon' => $amenity->icon,  
           ];
    }

}
