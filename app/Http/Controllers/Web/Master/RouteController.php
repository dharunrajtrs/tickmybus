<?php

namespace App\Http\Controllers\Web\Master;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use App\Models\Route;
use App\Models\Admin\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class RouteController extends BaseController
{
     protected $route;

    /**
     * RouteController constructor.
     *
     * @param \App\Models\Admin\Route $route
     */
    public function __construct(Route $make)
    {
        $this->make = $make;
    }
    public function index()
    {
        $page = trans('pages_names.view_route');

        $main_menu = 'master';
        $sub_menu = 'route';

        return view('admin.master.route.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {

        $page = trans('pages_names.add_route');

        $main_menu = 'master';
        $sub_menu = 'route';

        $services = ServiceLocation::whereActive(true)->get();

        return view('admin.master.route.create', compact('page', 'main_menu', 'sub_menu','services'));
    }

     public function fetch(QueryFilterContract $queryFilter)
    {
        $query = $this->make->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.master.route._route', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('routes')->with('warning', $message);
        }
        // dd($request->all());

        Validator::make($request->all(), [
            'from' => 'required|unique:routes,from',
            'to' => 'required',
            'service_location_id'=>'required'
        
        ])->validate();

        $created_params = $request->only(['from','to','from_lat','from_lng','to_lat','to_lng','service_location_id']);
        $created_params['active'] = 1;

        // $created_params['company_key'] = auth()->user()->company_key;

        $this->make->create($created_params);

        $message = trans('succes_messages.route_added_succesfully');

        return redirect('routes')->with('success', $message);
    }
     public function getById(Route $route)
    {
      
        $page = trans('pages_names.edit_route');

        $main_menu = 'master';
        $sub_menu = 'route';
        $item = $route;
        $services =ServiceLocation::whereActive(true)->get();


        return view('admin.master.route.update', compact('item', 'page', 'main_menu', 'sub_menu','services'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function update(Request $request,Route $route)
    {
        
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('routes')->with('warning', $message);
        }

        // dd($request->all());

        Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
            'service_location_id'=>'required'

        ])->validate();


        $updated_params = $request->all();
        $route->update($updated_params);
        // $updated_params['service_location_id'] = $request->service_location_id;
        $message = trans('succes_messages.route_updated_succesfully');
        return redirect('routes')->with('success', $message);
    }

     public function toggleStatus(Route $route)
    {
        $status = $route->isActive() ? false: true;
        $route->update(['active' => $status]);

        $message = trans('succes_messages.route_status_changed_succesfully');
        return redirect('routes')->with('success', $message);
    }

     public function delete(Route $route)
    {
        $route->delete();

        $message = trans('succes_messages.route_deleted_succesfully');
        return redirect('routes')->with('success', $message);
    }

   
}
