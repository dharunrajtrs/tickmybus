<?php
namespace App\Http\Controllers\Web\Master;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use App\Models\City;
use App\Models\Admin\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Models\Admin\Owner;

class CityController extends BaseController
{
     protected $city;

    /**
     * CityControllers constructor.
     *
     * @param \App\Models\Admin\City $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    public function index()
    {
        $page = trans('pages_names.view_city');

        $main_menu = 'master';
        $sub_menu = 'city';

        return view('admin.master.city.index', compact('page', 'main_menu', 'sub_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = trans('pages_names.add_city');

        $main_menu = 'master';
        $sub_menu = 'city';

        return view('admin.master.city.create', compact('page', 'main_menu', 'sub_menu',));
    }


    public function fetch(QueryFilterContract $queryFilter)
    {

        //$query = $this->city->query();//->active()
        $query = City::where('owner_id', auth()->user()->owner->id)->orderBy('created_at', 'desc');
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.master.city._city', compact('results'));
    }


    public function store(Request $request)
    {
        $owner_id=auth()->user()->owner->id;
        Validator::make($request->all(),
        [
            'city' => 'required',
            'short_code' => 'required|max:3',
        ])->validate();

        $created_params = $request->only(['city','short_code']);
        $created_params['active'] = 1;
        $created_params['owner_id'] = $owner_id;
        $this->city->create($created_params);
        $message = trans('succes_messages.city_added_succesfully');
        return redirect('city')->with('success', $message);
    }


    public function getById(City $city)
    {


        $page = trans('pages_names.edit_city');

        $main_menu = 'master';
        $sub_menu = 'city';
        $item = $city;


        return view('admin.master.city.update', compact('item', 'page', 'main_menu', 'sub_menu'));
    }



   public function update(Request $request,City $city)
    {

        Validator::make($request->all(), [
            'city' => 'required',
            'short_code' => 'required|max:3',
        ])->validate();

        $updated_params = $request->all();
        $city->update($updated_params);
        $message = trans('succes_messages.city_updated_succesfully');
        return redirect('city')->with('success', $message);
    }


    public function toggleStatus(City $city)
    {
        $status = $city->isActive() ? false: true;
        $city->update(['active' => $status]);

        $message = trans('succes_messages.city_status_changed_succesfully');
        return redirect('city')->with('success', $message);
    }

     public function delete(City $city)
    {
        $city->delete();

        $message = trans('succes_messages.city_deleted_succesfully');
        return redirect('city')->with('success', $message);
    }


}
