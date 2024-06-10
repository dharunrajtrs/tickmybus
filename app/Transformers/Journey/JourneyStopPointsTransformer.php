<?php

namespace App\Transformers\Journey;

use App\Models\Admin\JourneyStopPoint;
use App\Transformers\Transformer;
use App\Transformers\Journey\BusTransformer;

class JourneyStopPointsTransformer extends Transformer
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
    public function transform(JourneyStopPoint $JourneyStopPoint)
    {
        return [
            'id' => $JourneyStopPoint->journey->id,
            'stop_id'=>$JourneyStopPoint->stop_id,
            'stop_time'=>$JourneyStopPoint->getStopAttribute(),
            'stop_address'=>$JourneyStopPoint->stopPoint->boarding_address
        ];
    }
    
}
