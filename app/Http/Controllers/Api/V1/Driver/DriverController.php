<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\BaseController;
use App\Models\User;
use App\Base\Constants\Auth\Role;
use Illuminate\Http\Request;
use App\Models\BoardingPoint;
use App\Transformers\CityTransformer;
use App\Models\Admin\Journey;
use App\Transformers\Journey\JourneyTransformer;
use App\Models\Admin\JourneyUser;
use App\Models\Admin\JourneyPassenger;
use App\Models\Admin\JourneyBoardingPoint;
use Kreait\Firebase\Contract\Database;
use App\Transformers\Journey\JourneyUserTransformer;
use App\Transformers\Journey\JourneyBoardingPointsTransformer;
use App\Models\Admin\MetaBooking;
use App\Models\Payment\UserBankInfo;
use App\Transformers\Payment\WalletWithdrawalRequestsTransformer;
use App\Models\Payment\WalletWithdrawalRequest;
use App\Base\Filters\Admin\RequestFilter;
use Carbon\Carbon;
use App\Transformers\BoardingPointsTransformer;
use App\Base\Filters\Admin\JourneyFilter;



class DriverController extends BaseController
{
    



public function assignedJourney()
{
    $query = Journey::orderBy('created_at', 'desc');

    if (auth()->user()->hasRole(Role::DRIVER)) {
        $driver_id = auth()->user()->driver->id;
        $query->where('driver_id', $driver_id);
    } elseif (auth()->user()->hasRole(Role::OWNER)) {
        $owner_id = auth()->user()->owner->id;
        $query->whereHas('fleet', function ($query) use ($owner_id) {
            $query->where('owner_id', $owner_id);
        });
    }

    $result = filter($query, new JourneyTransformer, new JourneyFilter)->paginate();

    return $this->respondSuccess($result);
}

/*todayJourney*/
    public function todayJourney()
    {

        $driver = auth()->user()->driver;

        $today = Carbon::now()->format('y-m-d');


        $todayJourney = Journey::where('driver_id', $driver->id)->whereDate('depature_at',  $today)->get();
       

        $result = fractal($todayJourney, new JourneyTransformer);


        return $this->respondSuccess($result);

    }


    /**
     * Find Journeys
     * @queryParam  journey_id
     * @queryParam  
     * @queryParam  
     * @response 
     * */


    public function passengersList()
    {
        $driver = auth()->user()->driver;

        $journey= Journey::where('id', request()->input('journey_id'))->first();


        if (request()->input('boarding_points')==true) 
        {

        $boarding_ids = $journey->journeyBoardingPoint()->pluck('boarding_id');
       
        foreach ($boarding_ids as $boarding_id) 
        {

        $boardingpoints = BoardingPoint::where('id', $boarding_id)->get();

        $result  = fractal($boardingpoints, new BoardingPointsTransformer);

        return $this->respondSuccess($result);
        }


      }elseif (request()->input('stop_points')==true) {

        $stop_ids = $journey->journeyStopPoint()->pluck('stop_id');
       
            foreach ($stop_ids as $stop_id) 
            {

                $stop_ids = BoardingPoint::where('id', $stop_id)->get();

            $result  = fractal($stop_ids, new BoardingPointsTransformer);

            return $this->respondSuccess($result);

            }

        }else{


          $boardingpoints= JourneyBoardingPoint::where('journey_id', request()->input('journey_id'))->get();


        $result  = fractal($boardingpoints, new JourneyBoardingPointsTransformer);

        return $this->respondSuccess($result);


     }


    }

    /**
     * Find Journeys
     * @queryParam  journey_id
     * @queryParam  
     * @queryParam  
     * @response 
     * */

    public function journeyStart()
    {
        $driver = auth()->user()->driver;

        // $jouney_id = request()->input('journey_id');

        $journey = Journey::where('id', request()->input('journey_id'))->first();

        $depature = $journey->depature_at;
        $splitTimeStamp = explode(" ",$depature);
      
        $date = $splitTimeStamp[0];
        // $time = $splitTimeStamp[1];


        $today =Carbon::today()->toDateString();

        if($date<=$today)
        {
            $start_params['is_trip_start'] = true;
            $start_params['started_at'] = Carbon::now()->toDateTimeString();
            
            $journey->update($start_params);
       
           return $this->respondSuccess();

        }else
        {
            return $this->respondFailed("journey date is greater than today");

        }

    }

// passengersBoardingStatus

    public function passengersBoardingStatus(Request $request)
    {

        $passenger = JourneyPassenger::find($request->id);

        $passenger->update(['boarding_status'=>$request->status]);

        return $this->respondSuccess();


    }


    /**
     * Find Journeys
     * @queryParam  journey_id
     * @queryParam  
     * @queryParam  
     * @response 
     * */
    
    public function journeyEnd()
    {
        $driver = auth()->user()->driver;

        // $jouney_id = request()->input('journey_id');

        $journey = Journey::where('id', request()->input('journey_id'))->first();

        if ($journey->is_completed == false) {

            $end_params['is_completed'] = true;
            $end_params['completed_at'] = Carbon::now()->toDateTimeString();
            
            $journey->update($end_params);

        $journey_users = $journey->journeyUser()->get();

        foreach ($journey_users as $journey_user) 
        {
                $journey_user->update(['is_completed' => true]);     
        }

       
           return $this->respondSuccess();
        }else{
            return $this->respondFailed("Journey Already Completed");

        }

    }

}
