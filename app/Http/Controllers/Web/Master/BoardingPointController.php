<?php
namespace App\Http\Controllers\Web\Master;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use App\Models\BoardingPoint;

use App\Models\Admin\BoardingDropingPoint;
use App\Models\Admin\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Models\AllCities;
use App\Models\City;

class BoardingPointController extends BaseController
{

      /**
     * The User Details model instance.
     *
     * @var \App\Models\Admin\BoardingDropingPoint $boardingdropingPoint
     */


     protected $boardingPoint;
     protected $boardingdropingPoint;
    /**
     * BoardingPointControllers constructor.
     *
     * @param \App\Models\BoardingPoint $boarding
     */
    public function __construct(BoardingPoint $boardingPoint , BoardingDropingPoint $boardingdropingPoint)
    {
        $this->boardingPoint = $boardingPoint;
        $this->boardingdropingPoint = $boardingdropingPoint;
    }

    public function index()
    {
        $page = trans('pages_names.view_boarding');

        $main_menu = 'master';
        $sub_menu = 'boardingpoint';

        return view('admin.master.boarding.index', compact('page', 'main_menu', 'sub_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = trans('pages_names.add_boarding');

        $main_menu = 'master';
        $sub_menu = 'boarding';
        $cities=AllCities::all();

        return view('admin.master.boarding.create', compact('page', 'main_menu', 'sub_menu','cities'));
    }


    public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->boardingPoint->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.master.boarding._boarding', compact('results'));
    }


    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'landmark' => 'required',
            'city_id' =>'required',
            'short_code'=>'required',


        ])->validate();
        $owner_id=auth()->user()->owner->id;
        $created_params = $request->only(['city_id','boarding_address','boarding_lat','boarding_lng','landmark','short_code']);
        $created_params['active'] = 1;
        $created_params['owner_id'] = $owner_id;
        $boardingPoint= $this->boardingPoint->create($created_params);

        if($request->has('boarding_point'))
{
    foreach ($request->boarding_point as $key => $point)
    {
          $boarding_params['boarding_droping_point_address'] = $request->boarding_point[$key];

          $boardingPoint->BoardingDropingPoint()->create($boarding_params);
    }

}
        $message = trans('succes_messages.boarding_point_added_succesfully');

        return redirect('boarding_point')->with('success', $message);
    }


    public function getById(BoardingPoint $boarding)
    {


        $page = trans('pages_names.edit_boarding');

        $main_menu = 'master';
        $sub_menu = 'boarding';
        $item = $boarding;

        $cities = AllCities::whereActive(true)->get();

        return view('admin.master.boarding.update', compact('item', 'page', 'main_menu', 'sub_menu','cities'));
    }



   public function update(Request $request,BoardingPoint $boarding)
    {



        Validator::make($request->all(), [
            'boarding_address' => 'required',

            'landmark' => 'required',
            'city_id' =>'required',

        ])->validate();
// dd($request);

        $updated_params = $request->all();
        $boarding->update($updated_params);
        $message = trans('succes_messages.boarding_updated_succesfully');
        return redirect('boarding_point')->with('success', $message);
    }


    public function toggleStatus(BoardingPoint $boarding)
    {
        $status = $boarding->isActive() ? false: true;
        $boarding->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('boarding_point')->with('success', $message);
    }

     public function delete(BoardingPoint $boarding)
    {
        $boarding->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('boarding_point')->with('success', $message);
    }
    public function getCity()
    {

        $service_location = request()->service_location_id;

        $city = City::where('service_location_id', $service_location)->get();
        // dd($city);
        return $city;

    }

    public function getToCity($cityId) {
        $service_location = request()->service_location_id;
        $city = City::where('service_location_id', $service_location)
                    ->where('id', '!=', $cityId)
                    ->get();

        return $city;

    }


}
