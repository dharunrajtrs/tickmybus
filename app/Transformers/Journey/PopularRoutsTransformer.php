<?php

namespace App\Transformers\Journey;

use App\Transformers\Transformer;
use App\Models\Admin\JourneyUser;



class PopularRoutsTransformer extends Transformer
{

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(JourneyUser $journeyUser)
    {
       $params = [
            'from_city'=> "Coimbatore",
            'to_city'=> "Chennai",  
            'from_city_code'=> "CBE",
            'to_city_code'=> "CHN", 
        ];


        return $params;
    }
 


}
