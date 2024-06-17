<?php
namespace App\Http\Controllers\Web\Master;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use App\Models\AdminBoardingPoint;

use App\Models\Admin\BoardingDropingPoint;
use App\Models\Admin\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Models\AllCities;
use App\Models\City;

class AdminBoardingPointController extends BaseController
{

      /**
     * The User Details model instance.
     *
     * @var \App\Models\Admin\BoardingDropingPoint $boardingdropingPoint
     */


     protected $adminboardingPoint;
     protected $boardingdropingPoint;
    /**
     * BoardingPointControllers constructor.
     *
     * @param \App\Models\AdminBoardingPoint $boarding
     */
    public function __construct(AdminBoardingPoint $boardingPoint , BoardingDropingPoint $boardingdropingPoint)
    {
        $this->adminboardingPoint = $boardingPoint;
        $this->boardingdropingPoint = $boardingdropingPoint;
    }

    public function index()
    {
        $page = trans('pages_names.view_boarding');

        $main_menu = 'master';
        $sub_menu = 'boardingpoint';

        return view('admin.master.admin_boarding.index', compact('page', 'main_menu', 'sub_menu'));
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

        return view('admin.master.admin_boarding.create', compact('page', 'main_menu', 'sub_menu','cities'));
    }


    public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->adminboardingPoint->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.master.admin_boarding._boarding', compact('results'));
    }


    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'city_id' =>'required',
            'short_code'=>'required',


        ])->validate();

        $user_id=auth()->user()->id;
        $created_params = $request->only(['city_id','boarding_address','boarding_lat','boarding_lng','landmark','short_code']);
        $created_params['active'] = 1;
        $created_params['user_id'] = $user_id;
        $boardingPoint= $this->adminboardingPoint->create($created_params);

        if($request->has('boarding_point'))
{
    foreach ($request->boarding_point as $key => $point)
    {
          $boarding_params['boarding_droping_point_address'] = $request->boarding_point[$key];

          $boardingPoint->BoardingDropingPoint()->create($boarding_params);
    }

}
        $message = trans('succes_messages.boarding_point_added_succesfully');

        return redirect('admin_boarding_point')->with('success', $message);
    }


    public function getById(adminboardingPoint $boarding)
    {


        $page = trans('pages_names.edit_boarding');

        $main_menu = 'master';
        $sub_menu = 'boarding';
        $item = $boarding;

        $cities = AllCities::whereActive(true)->get();

        $boarding_droping_points = BoardingDropingPoint::where('admin_boarding_id',$item->id)->get();


        return view('admin.master.admin_boarding.update', compact('item', 'page', 'main_menu', 'sub_menu','cities','boarding_droping_points'));
    }



    public function update(Request $request, AdminBoardingPoint $boarding)
    {
        Validator::make($request->all(), [
            'city_id' => 'required',
            'short_code' => 'required',
        ])->validate();

        $updated_params = $request->all();
        $boarding->update($updated_params);

        if ($request->has('boarding_points')) {
            foreach ($request->boarding_points as $id => $point) {
                // Check if the ID is a valid UUID or if it should be created as new
                if (is_string($id) && !empty($id)) {
                    $boardingDropingPoint = BoardingDropingPoint::find($id);
                    if ($boardingDropingPoint) {
                        // Update existing boarding point
                        $boardingDropingPoint->update([
                            'boarding_droping_point_address' => $point['address'],
                        ]);
                    } else {
                        // Create new boarding point with given ID
                        $boarding->BoardingDropingPoint()->create([
                            'id' => $id,
                            'boarding_droping_point_address' => $point['address'],
                        ]);
                    }
                } else {
                    // Create new boarding point without an ID
                    $boarding->BoardingDropingPoint()->create([
                        'boarding_droping_point_address' => $point['address'],
                    ]);
                }
            }
        }

        $message = trans('success_messages.boarding_updated_successfully');
        return redirect('admin_boarding_point')->with('success', $message);
    }


    public function toggleStatus(BoardingPoint $boarding)
    {
        $status = $boarding->isActive() ? false: true;
        $boarding->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('admin_boarding_point')->with('success', $message);
    }

    public function delete(Request $request, $id)
{
    $boarding = adminboardingPoint::findOrFail($id);

    $boarding->delete();

    $message = trans('success_messages.boarding_deleted_successfully');
    return redirect('admin_boarding_point')->with('success', $message);
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
