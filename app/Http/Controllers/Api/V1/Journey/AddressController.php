<?php

namespace App\Http\Controllers\Api\V1\Journey;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\BaseController;
use App\Models\User;
use App\Base\Constants\Auth\Role;
use Illuminate\Http\Request;
use App\Models\BoardingPoint;
use App\Models\City;
use App\Transformers\CityTransformer;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Filters\Admin\JourneyFilter;
use App\Models\Admin\Journey;
use App\Transformers\Journey\JourneyTransformer;
use App\Models\Admin\FleetSeatLayout;
use App\Transformers\Journey\SeatLayoutTransformer;
use App\Models\Admin\JourneyUser;
use App\Models\Admin\JourneyPassenger;
use Kreait\Firebase\Contract\Database;
use App\Transformers\Journey\JourneyUserTransformer;
use App\Models\Admin\MetaBooking;
use App\Models\Payment\UserBankInfo;
use App\Transformers\Payment\WalletWithdrawalRequestsTransformer;
use App\Models\Payment\WalletWithdrawalRequest;
use App\Base\Filters\Admin\RequestFilter;
use App\Models\Admin\JourneyBill;
use Illuminate\Support\Str;
use App\Base\Constants\Masters\WalletRemarks;
use App\Models\Payment\OwnerWalletHistory;
use App\Models\Payment\OwnerWallet;
use App\Models\Admin\Promo;
use App\Transformers\Journey\PopularRoutsTransformer;

use DB;


class AddressController extends BaseController
{
    
    protected $journeyUser;

    public function __construct(JourneyUser $journeyUser, Database $database)
    {
        $this->journeyUser = $journeyUser;
        $this->database = $database;
    }

    /**
     * List Routes & Boarding Points by the keyword provided by the customer
     * 
     * 
     * */
    public function listAddress(Request $request){

        $city = City::get();

        $result = fractal($city, new CityTransformer)->parseIncludes('boardingPoints');

        return $this->respondSuccess($result);

    }

    /**
     * Find Journeys
     * @queryParam from string required  from address of journey
     * @queryParam to string required  to address of journey
     * @queryParam date date required  date of journey
     * @response 
     * */
    public function listOfJourneys(QueryFilterContract $queryFilter){

        /**
         * Validate the request params
         * find valid journeys by provided request params
         * 
         * */

        $requestDate = str_replace('/', '-', request()->input('date'));

        // $journeys = Journey::where('from_city_id',request()->input('from'))->where('to_city_id',request()->input('to'))->whereDate('depature_at',$date)->get();

        $date =  date("Y-m-d", strtotime($requestDate));

        $query = Journey::leftjoin('fleets','journeys.fleet_id','=','fleets.id')
        ->select('journeys.*')
        ->where('journeys.from_city_id',request()->input('from'))
        ->where('journeys.to_city_id',request()->input('to'))
        ->whereDate('journeys.depature_at',$date)
        ->where('journeys.is_completed', 0)
        ->where('journeys.is_cancelled', 0)
        ->where('journeys.is_trip_start', 0);

        $journeys = $queryFilter->builder($query)->customFilter(new JourneyFilter)->get();

    
        $result = fractal($journeys, new JourneyTransformer)->parseIncludes(['bus','boardingpoints']);

        return $this->respondSuccess($result);


    }
    /**
     * Find SeatLayout
     * @queryParam journey_id foreign key required 
     * @queryParam  
     * @queryParam  
     * @response 
     * */
    public function singleJourney(){

        /**
         * Validate the request params
         * find valid seat_layout by provided request params
         * 
         * */

       $journey = Journey::where('id', request()->input('journey_id'))->first();

       $result = fractal($journey, new JourneyTransformer)->parseIncludes(['bus.seatLayout','boardingpoints','stoppoints', 'bus.amenties']);

        return $this->respondSuccess($result);

    }

    /**
     * Find For Testings Api
     * @queryParam journey_id foreign key required 
     * @queryParam  
     * @queryParam  
     * @response 
     * */ 
    public function todayJourney(){

        /**
         * Validate the request params
         * find valid seat_layout by provided request params
         * 
         * */

        $today = date('Y-m-d');
 
        $journeys = Journey::whereDate('depature_at', $today)->get();

    
        $result = fractal($journeys, new JourneyTransformer)->parseIncludes(['boardingpoints','stoppoints', 'bus.amenties']);

        return $this->respondSuccess($result);

    }

    /******
     *@queryParam 
     * user_id : auth->user->id
     *  
     * */

    public function history()
    { 
            if( (request()->input('is_cancelled')) == true)
            {     
              $query = JourneyUser::where('user_id', auth()->user()->id)->where('is_completed', false)->where('is_cancelled', true)->orderBy('created_at', 'desc')->get();

            }elseif( (request()->input('is_completed')) == true) 
            {
              $query = JourneyUser::where('user_id', auth()->user()->id)->where('is_completed', true)->where('is_cancelled', false)->orderBy('created_at', 'desc')->get();
            }else
            {
              $query = JourneyUser::where('user_id', auth()->user()->id)->where('is_completed', false)->where('is_cancelled', false)->orderBy('created_at', 'desc')->get();
            }     
            // dd($query);
                $result  = fractal($query, new JourneyUserTransformer);
                return $this->respondSuccess($result,'history_listed');

    }

     /******
     *@queryParam 
     * user_id : auth->user->id
     *  
     * */

    public function popularRoutes()
    { 
        $query = DB::table('journeys')
            ->select('from_city_id', 'to_city_id', DB::raw('COUNT(*) as booking_count'))
            ->groupBy('from_city_id', 'to_city_id')
            ->get();

        // dd($query);

        $result = fractal($query, new PopularRoutsTransformer);


        return $this->respondSuccess($result);
    }   
 
}
