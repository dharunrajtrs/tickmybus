<?php

namespace App\Transformers\Driver;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Driver;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Models\Admin\DriverDocument;
use App\Models\Admin\DriverNeededDocument;
use App\Transformers\Access\RoleTransformer;
use App\Transformers\Requests\TripRequestTransformer;

class DriverTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = [
        
    ];

    /**
    * Resources that can be included default.
    *
    * @var array
    */
    protected array $defaultIncludes = [

    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Driver $user)
    {
        $params = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'owner_id'=>$user->owner_id,
            'mobile' => $user->user->countryDetail->dial_code.$user->mobile,
            'profile_picture' => $user->profile_picture,
            'active' => (bool)$user->active,
            'fleet_id'=>$user->fleet_id,
            'approve' => (bool)$user->approve,
            'available' => (bool)$user->available,
            'service_location_id'=>$user->service_location_id,
            'driver_lat'=>$user->driver_lat,
            'driver_lng'=>$user->driver_lng,
            'rating'=>round($user->rating, 2),
            'no_of_ratings' => $user->no_of_ratings,
            'timezone'=>$user->timezone,
            'refferal_code'=>$user->user->refferal_code,
            //'map_key'=>get_settings('google_map_key'),
            'company_key'=>$user->user->company_key,
            'currency_symbol' => $user->user->countryDetail?$user->user->countryDetail->currency_symbol:'₹'
        ];

    
        $current_date = Carbon::now();

     
        $timezone = $user->user->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');

        $updated_current_date =  $current_date->setTimezone($timezone);

        $params['current_date'] = $updated_current_date->toDateString();


        return $params;
    }
 
}
