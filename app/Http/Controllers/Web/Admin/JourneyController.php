<?php

namespace App\Http\Controllers\Web\Admin;

use Carbon\Carbon;
use App\Models\Country;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Web\BaseController;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Base\Filters\Admin\RequestFilter;
use App\Models\Admin\Journey;
use App\Models\Admin\Fleet;
use App\Models\Admin\CommanFleet;
use App\Models\Admin\Driver;
use App\Models\Admin\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Journey\CreateJourneyRequest;
use App\Models\Admin\FleetSeatLayout;
use App\Models\Admin\ServiceLocation;
use App\Models\AllCities;
use Illuminate\Validation\ValidationException;
use App\Models\BoardingPoint;
use App\Models\Admin\BoardingDropingPoint;
use App\Jobs\Notifications\SendPushNotification;
use App\Models\Admin\JourneyBoardingPoint;
use App\Models\Admin\JourneyStopPoint;
use DateTime;
use Illuminate\Support\Facades\Http;
use App\Transformers\Journey\JourneyTransformer;

class JourneyController extends BaseController
{
    /**
     * The User Details model instance.
     *
     * @var \App\Models\Admin\Journey
     */
    protected $journey ;

    /**
     * The User model instance.
     *
     * @var \App\Models\User
     */
    protected $imageUploader;

    /**
     * User Details Controller constructor.
     *
     * @param \App\Models\Admin\journey $user_details
     */
    public function __construct(Journey $journey, ImageUploaderContract $imageUploader)
    {
        $this->imageUploader = $imageUploader;
        $this->journey = $journey;

    }

    /**
    * Get all journey
    * @return \Illuminate\Http\JsonResponse
    */
    public function index()
    {
        $page = trans('pages_names.journey');

        $main_menu = 'view_journey';
        $sub_menu = 'journey';

        return view('admin.journey.index', compact('page', 'main_menu', 'sub_menu'));
    }

    public function fetch(QueryFilterContract $queryFilter)
    {

        if (access()->hasRole(RoleSlug::SUPER_ADMIN))
        {
              $query = Journey::where('is_completed', false)->orderBy('created_at', 'desc');
        } else {
                $fleets = auth()->user()->owner->fleet;
                $this->validateAdmin();
                foreach ($fleets as $fleet)
                {
                $query = Journey::where('is_completed', false)->where('fleet_id', $fleet->id)->orderBy('created_at', 'desc');
                }

        }

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.journey._journey', compact('results'));
    }
    public function completedJourneys()
    {
        $page = trans('pages_names.journey');

        $main_menu = 'view_journey';
        $sub_menu = 'completed-journey';

        return view('admin.journey.completedJourney', compact('page', 'main_menu', 'sub_menu'));
    }
    /*completedFetch*/
    public function completedFetch(QueryFilterContract $queryFilter)
    {
        if (access()->hasRole(RoleSlug::SUPER_ADMIN))
        {
              $query = Journey::where('is_completed', true)->where('is_cancelled', false)->orderBy('created_at', 'desc');
        } else {
                $fleets = auth()->user()->owner->fleet;
                $this->validateAdmin();
                foreach ($fleets as $fleet)
                {
                $query = Journey::where('is_completed', true)->where('fleet_id', $fleet->id)->orderBy('created_at', 'desc');
                }

        }



        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.journey._journey', compact('results'));
    }


    /**
    * Create Journey View
    *
    */
    public function create()
    {
        $page = trans('pages_names.add_journey');
        $user_checking_id=auth()->user()->id;
        $owner = Owner::where('user_id',$user_checking_id)->first();
        $fleets = Fleet::where('owner_id',$owner->id)->whereApprove(true)->get();
        $cities=AllCities::whereActive(true)->get();
        $cities2=AllCities::whereActive(true)->get();
        $main_menu = 'view_journey';
        $sub_menu = 'journey';

        $services = ServiceLocation::whereActive(true)->get();

     //   $cities = City::whereActive(true)->get();

        return view('admin.journey.create', compact('page', 'main_menu', 'sub_menu','fleets','services','cities','cities2'));
    }

    /**
     * Create Journey.
     *
     * @param \App\Http\Requests\Admin\User\CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(CreateJourneyRequest $request)
    {


        // if(in_array($request->boarding_point, $request->drop_point))
        // {
        //     dd('test');
        // }

        // dd($request->all());

        $created_params = $request->only(['fleet_id','depature_at','arrived_at','from','from_lat','from_lng','to','to_lat','to_lng','sleeper_price','seater_price','semi_sleeper_price','upper_seater_price','upper_sleeper_price','upper_semi_sleeper_price','from_city_id','to_city_id','service_location_id','schedule_name','display_name']);

        // Get last journeys request_number
        $journey_number = $this->journey->orderBy('created_at', 'DESC')->pluck('journey_number')->first();
        if ($journey_number) {
            $journey_number = explode('_', $journey_number);
            $journey_number = $journey_number[1]?:000000;
        } else {
            $journey_number = 000000;
        }
        // Generate request number
        $journey_number = 'JOURNEY_'.sprintf("%06d", $journey_number+1);

        if(($request->from_city_id) == ($request->to_city_id))
       {
        throw ValidationException::withMessages(['to_city_id' => __('from and To are same place')]);
       }

        $created_params['journey_number'] =  $journey_number;

        $departureDateTime = new DateTime($request->depature_at);
        $arrivalDateTime = new DateTime($request->arrived_at);

        $interval = $departureDateTime->diff($arrivalDateTime);

        $days = $interval->d;
        $hours = $interval->h;
        $minutes = $interval->i;

        $created_params['duration'] =  (($days * 24)+$hours)." H ".$minutes." M ";
        $journey = $this->journey->create($created_params);


/*borading_points*/
        if($request->has('boarding_point'))
        {
            foreach ($request->boarding_point as $key => $point)
            {
                  $boarding_params['boarding_id']   =  $point;
                  $boarding_params['boarding_time'] = $request->boarding_time[$key];

                  $journey->journeyBoardingPoint()->create($boarding_params);
            }

        }
/*stop_points*/
                        // dd($journey->journeyBoardingPoint());
        if($request->has('drop_point'))
        {
            foreach ($request->drop_point as $key => $dpoint)
            {
                  $stop_params['stop_id']   =  $dpoint;
                  $stop_params['stop_time'] = $request->droping_time[$key];

                  $journey->journeyStopPoint()->create($stop_params);
            }

        }

        $message = trans('succes_messages.journey_created_succesfully');

        return redirect('journey')->with('success', $message);
    }
    public function getFleet()
    {
        $fleet_id = request()->fleet;
        $fleets= Fleet::whereId($fleet_id)->first();
        $fleet_id= $fleets->comman_fleet_id;
       $comman_fleet = CommanFleet::whereId($fleet_id)->first();
        $seatTypes = ['seater', 'semi_sleeper', 'sleeper'];

        $upperSeatTypeExists = FleetSeatLayout::where('fleet_id', $comman_fleet->id)
            ->where('deck_type', 'upper')
            ->whereIn('seat_type', $seatTypes)
            ->distinct('seat_type')
            ->pluck('seat_type')
            ->toArray();


        $seatTypeExists = FleetSeatLayout::where('fleet_id', $comman_fleet->id)
            ->where('deck_type', 'lower')
            ->whereIn('seat_type', $seatTypes)
            ->distinct('seat_type')
            ->pluck('seat_type')
            ->toArray();
            // dd($seatTypeExists);

        return response()->json(array(
			'fleets' => $comman_fleet->seat_type,
			'upperSeatTypeExists' => $upperSeatTypeExists,
            'seatTypeExists' => $seatTypeExists,
		));
    }
    // get Boarding and Drop points
    public function getBoarding()
    {
        $city_id = request()->city_id;
        $boardingPoint = BoardingPoint::where('city_id', $city_id)->first();

        $boarding = BoardingDropingPoint::where('boarding_id', $boardingPoint->id)
            ->select('id', 'boarding_id', 'admin_boarding_id', 'boarding_droping_time', 'boarding_droping_point_address', 'created_at', 'updated_at')
            ->get();

        // dd($boarding->toArray());

        return $boarding;
    }



    public function getById(Journey $journey)
    {
        $page = trans('pages_names.edit_journey');

        $item = $journey;
        $user_checking_id=auth()->user()->id;
        $owner = Owner::where('user_id',$user_checking_id)->first();
        $fleets = Fleet::where('owner_id',$owner->id)->whereApprove(true)->get();
        $services =ServiceLocation::whereActive(true)->get();
        // dd($services);
        $user_checking_id=auth()->user()->id;
        $cities=AllCities::whereActive(true)->get();
        $cities2=AllCities::whereActive(true)->get();
        $boardingPoint = BoardingPoint::where('city_id',$item->from_city_id)->first();

        $boarding = BoardingDropingPoint::where('boarding_id', $boardingPoint->id)
            ->select('id', 'boarding_id', 'admin_boarding_id', 'boarding_droping_time', 'boarding_droping_point_address', 'created_at', 'updated_at')
            ->get();

            $droppingPoint = BoardingPoint::where('city_id',$item->to_city_id)->first();

            $dropping = BoardingDropingPoint::where('boarding_id', $boardingPoint->id)
                ->select('id', 'boarding_id', 'admin_boarding_id', 'boarding_droping_time', 'boarding_droping_point_address', 'created_at', 'updated_at')
                ->get();

        // $dropping = BoardingPoint::where('city_id',$item->to_city_id)->get();
        // // dd($boarding);
// dd($dropping->all());
        $main_menu = 'view_journey';
        $sub_menu = 'journey_details';

        return view('admin.journey.update', compact('page', 'main_menu', 'sub_menu','fleets','item','services','cities','boarding','dropping'));
    }

    public function update(CreateJourneyRequest $request, Journey $journey)
    {
        if(($request->from_city_id) == ($request->to_city_id))
        {
         throw ValidationException::withMessages(['to_city_id' => __('from and To are same place')]);
        }

        $departureDateTime = new DateTime($request->depature_at);
        $arrivalDateTime = new DateTime($request->arrived_at);

        $interval = $departureDateTime->diff($arrivalDateTime);

        $days = $interval->d;
        $hours = $interval->h;
        $minutes = $interval->i;

        $updated_params = $request->all();
        $updated_params['duration'] =  (($days * 24)+$hours)." H ".$minutes." M ";

        $journey->update($updated_params);




        /*borading_points*/
        if($request->has('boarding_point'))
        {
            $journey_id = $request->id;
            JourneyBoardingPoint::where('journey_id', '=', $journey_id)->delete();
            foreach ($request->boarding_point as $key => $point)
            {

                  $boarding_params['boarding_id']   =  $point;
                  $boarding_params['boarding_time'] = $request->boarding_time[$key];

                  $journey->journeyBoardingPoint()->create($boarding_params);
            }

        }
/*stop_points*/


        if($request->has('drop_point'))
        {
            $journey_id = $request->id;
            JourneyStopPoint::where('journey_id', '=', $journey_id)->delete();
            foreach ($request->drop_point as $key => $dpoint)
            {
                  $stop_params['stop_id']   =  $dpoint;
                  $stop_params['stop_time'] = $request->droping_time[$key];

                  $journey->journeyStopPoint()->create($stop_params);
            }

        }

        $message = trans('succes_messages.journey_updated_succesfully');

        return redirect('journey')->with('success', $message);
    }
    public function delete(Journey $journey)
    {
        $journey->delete();

        $message = trans('succes_messages.journey_deleted_succesfully');

        return $message;
    }

    public function assignDriverView(Journey $journey)
    {
        $main_menu = 'view_journey';
        $sub_menu = 'journey_details';
        $page = trans('pages_names.edit_journey');

        $item = $journey;

        $owner = $journey->fleet->owner;

        $drivers =Driver::where('owner_id', $owner->id)->get();

        return view('admin.journey.assign_driver', compact('page', 'main_menu', 'sub_menu', 'item','drivers',));
    }

    public function assignDriverupdate(Request $request, Journey $journey)
    {
        $driver_id = $request->driver_id;

        $journey->update(['driver_id' => $driver_id]);

         $message = trans('succes_messages.driver_assigned_succesfully');

        $title = trans('push_notifications.journey_assigned_title');
        $body = trans('push_notifications.journey_assigned_body');

        $user = $journey->driver;

        dispatch(new SendPushNotification($user,$title,$body));

        return redirect('journey')->with('success', $message);
    }
    public function cancel(Journey $journey)
    {
        $today =Carbon::now()->format('Y-m-d H:i:s');


        $journey->update(['is_cancelled' => true,
                    'cancelled_at' => $today]);

        $message = trans('succes_messages.journey_cancelled_succesfully');

        return redirect('journey')->with('success', $message);
    }
    public function cancelledJourneys()
    {

       $page = trans('pages_names.journey');

        $main_menu = 'view_journey';
        $sub_menu = 'cancelled-journey';

        return view('admin.journey.cancelledJourney', compact('page', 'main_menu', 'sub_menu'));
    }
    /*cancelledFetch*/
    public function cancelledFetch(QueryFilterContract $queryFilter)
    {
        if (access()->hasRole(RoleSlug::SUPER_ADMIN))
        {
              $query = Journey::where('is_cancelled', true)->where('is_completed', false)->orderBy('created_at', 'desc');
        } else {
                $fleets = auth()->user()->owner->fleet;
                $this->validateAdmin();
                foreach ($fleets as $fleet)
                {
                $query = Journey::where('is_cancelled', true)->where('fleet_id', $fleet->id)->orderBy('created_at', 'desc');
                }

        }

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.journey._journey', compact('results'));
    }
    public function viewJourney(Journey $journey)
    {
        $page = trans('pages_names.journey');
        $main_menu = 'view_journey';
        $sub_menu = 'view-journey';
        $item = $journey;
        $bus = $item->fleet;

        return view('admin.journey.view', compact('page', 'main_menu', 'sub_menu', 'item', 'bus'));
    }
    /**
     * Find SeatLayout
     * @queryParam journey_id foreign key required
     * @queryParam
     * @queryParam
     * @response
     * */
    public function signleJourney(Journey $journey)
    {
        $result = fractal($journey, new JourneyTransformer)->parseIncludes(['bus.seatLayout','boardingpoints','stoppoints', 'bus.amenties']);
        return response()->json($result, 200);

    }
}
