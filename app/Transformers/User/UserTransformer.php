<?php

namespace App\Transformers\User;

use App\Models\Admin\UserDriverNotification;
use App\Models\User;
use App\Models\Admin\JourneyUser;
use App\Base\Constants\Auth\Role;
use App\Transformers\Transformer;
use App\Transformers\Access\RoleTransformer;
use App\Models\Admin\Sos;
use App\Transformers\Common\SosTransformer;
use App\Transformers\User\FavouriteLocationsTransformer;
use App\Base\Constants\Setting\Settings;
use App\Transformers\Journey\JourneyUserTransformer;
use Carbon\Carbon;

class UserTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = [
        'roles'
    ];
    /**
     * Resources that can be included default.
     *
     * @var array
     */
    protected array $defaultIncludes = [
        'sos', 'journeyUser'

    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        $params = [
            'id' => $user->id,
            'name' => $user->name,
            'last_name' => $user->last_name,
            'age' => $user->age,
            'gender' => $user->gender,
            'username' => $user->username,
            'email' => $user->email,
            'dial_code' => $user->countryDetail->dial_code,
            'mobile' => $user->mobile,
            'profile_picture' => $user->profile_picture,
            'active' => $user->active,
            'email_confirmed' => $user->email_confirmed,
            'mobile_confirmed' => $user->mobile_confirmed,
            'last_known_ip' => $user->last_known_ip,
            'last_login_at' => $user->last_login_at,
            'rating' => round($user->rating, 2),
            'no_of_ratings' => $user->no_of_ratings,
            'refferal_code'=>$user->refferal_code,
            'currency_code'=>$user->countryDetail->currency_code,
            'currency_symbol'=>$user->countryDetail->currency_symbol,
            'country_code'=>$user->countryDetail->code,

        ];

        $params['contact_us_mobile1'] =  get_settings('contact_us_mobile1');
        $params['contact_us_mobile2'] =  get_settings('contact_us_mobile2');
        $params['contact_us_link'] =  get_settings('contact_us_link');

        $params['contact_us_link'] =  get_settings('contact_us_link');
 

        $referral_comission = get_settings('referral_commision_for_user');
        $referral_comission_string = 'Refer a friend and earn'.$user->countryDetail->currency_symbol.''.$referral_comission;
        $params['referral_comission_string'] = $referral_comission_string;

        $params['enable_country_restrict_on_map'] = (get_settings(Settings::ENABLE_COUNTRY_RESTRICT_ON_MAP));

      
        if($user->bankInfo != null)
        {
            $params['users_bank_info'] =  true;
        }else{
            $params['users_bank_info'] =  false;

        }
        $params['amount_refund_in_x_days'] = get_settings('amount_refund_in_x_days');

        return $params;
    }

    /**
     * Include the roles of the user.
     *
     * @param User $user
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeRoles(User $user)
    {
        $roles = $user->roles;

        return $roles
        ? $this->collection($roles, new RoleTransformer)
        : $this->null();
    }

     /**
    * Include the request meta of the user.
    *
    * @param User $user
    * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
    */
    public function includeSos(User $user)
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
    * Include the request meta of the user.
    *
    * @param User $user
    * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
    */
    public function includeJourneyUser(User $user)
    {
         $current_date = Carbon::today()->toDateTimeString();

        if($user->journeyUser != null)
        {
        $journey_exists =$user->journeyUser->journey()->whereDate('depature_at', $current_date)->exists();
        }else{
            $journey_exists = false;
        }
        if($journey_exists == true)
        {

            $journey = $user->journeyUser->journey()->whereDate('depature_at', $current_date)->where('is_completed', false)->pluck('id');
            // dd($journey);
            foreach ($journey as $journey_id)
             {
            
            $journeyUser = JourneyUser::where('journey_id', $journey_id)->get();

             return $journeyUser
            ? $this->collection($journeyUser, new JourneyUserTransformer)
            : $this->null();       
            }
        }else{
            $journeyUser = null;

             return $journeyUser
            ? $this->collection($journeyUser, new JourneyUserTransformer)
            : $this->null();   

        }


    }


}
