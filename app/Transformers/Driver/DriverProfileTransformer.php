<?php

namespace App\Transformers\Driver;

use App\Models\Admin\UserDriverNotification;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Driver;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Models\Admin\DriverDocument;
use App\Models\Admin\DriverNeededDocument;
use App\Transformers\Access\RoleTransformer;
use App\Base\Constants\Setting\Settings;
use App\Models\Admin\Sos;
use App\Transformers\Common\SosTransformer;
use App\Transformers\Journey\JourneyTransformer;

class DriverProfileTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = [ 'currentJourney'
       
    ];

    /**
    * Resources that can be included default.
    *
    * @var array
    */
    protected array $defaultIncludes = [
        'sos'
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
            'owner_id' => $user->owner_id,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'profile_picture' => $user->profile_picture,
            'active' => (bool)$user->active,
            'approve' => (bool)$user->approve,
            'available' => (bool)$user->available,
            'service_location_id'=>$user->service_location_id,
            'service_location_name'=>$user->serviceLocation->name,
             'driver_lat'=>$user->driver_lat,
            'driver_lng'=>$user->driver_lng,
            'rating'=>round($user->rating, 2),
            'no_of_ratings' => $user->no_of_ratings,
            'timezone'=>$user->timezone,
            'refferal_code'=>$user->user->refferal_code,
            //'map_key'=>get_settings('google_map_key'),
            'company_key'=>$user->user->company_key,
            'country_id'=>$user->user->countryDetail->id,
            'currency_symbol' => $user->user->countryDetail->currency_symbol,
            'role'=>'driver'
        ];
        $params['admin_commission'] = get_settings('admin_commission');
        $params['contact_us_mobile1'] =  get_settings('contact_us_mobile1');
        $params['contact_us_mobile2'] =  get_settings('contact_us_mobile2');
        $params['contact_us_link'] =  get_settings('contact_us_link');
        $params['show_wallet_feature_on_mobile_app'] =  get_settings('show_wallet_feature_on_mobile_app');
        $params['show_bank_info_feature_on_mobile_app'] =  get_settings('show_bank_info_feature_on_mobile_app');
        $params['contact_us_link'] =  get_settings('contact_us_link');
       
        $notifications_count= UserDriverNotification::where('driver_id',$user->id)
            ->where('is_read',0)->count();

        $params['notifications_count']=$notifications_count;

        $current_date = Carbon::now();

        $timezone = $user->user->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');

        $updated_current_date =  $current_date->setTimezone($timezone);

        $params['current_date'] = $updated_current_date->toDateString();

        $journey_detail = $user->journeyDetail()->where('is_trip_start', true)->first();
    if($journey_detail){

        if(($journey_detail->is_trip_start == true) && ($journey_detail->is_completed== false))
        {
        $params['is_trip_started']=true;

        $params['journey_id']=$journey_detail->id;

        }else{
        $params['is_trip_started']=false;
        }
    }else{
        $params['is_trip_started']=false;
        
    }

        return $params;
    }

    
    public function includeSos(Driver $user)
    {

        $request = Sos::select('id', 'name', 'number', 'user_type', 'created_by')
        ->where('created_by', auth()->user()->id)
        ->orWhere('user_type', 'admin')
        ->orderBy('created_at', 'Desc')
        ->companyKey()->get();

        return $request
        ? $this->collection($request, new SosTransformer)
        : $this->null();
    }

   /**
     * Include the request of the driver.
     *
     * @param User $user
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includecurrentJourney(Driver $driver)
    {
        $journey = $driver->journeyDetail()->where('is_trip_start', true)->where('is_completed', false)->first();

        return $journey
        ? $this->item($journey, new JourneyTransformer)
        : $this->null();
    }


}
