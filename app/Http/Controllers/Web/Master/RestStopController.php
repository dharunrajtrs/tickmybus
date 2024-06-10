<?php
namespace App\Http\Controllers\Web\Master;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use App\Models\RestStop;
use App\Models\Admin\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class RestStopController extends BaseController
{
     protected $restStop;

    /**
     * BoardingPointControllers constructor.
     *
     * @param \App\Models\Admin\BoardingPoint $boarding
     */
    public function __construct(RestStop $restStop)
    {
        $this->restStop = $restStop;
    }
    public function index()
    {
        $page = trans('pages_names.view_rest_stop');

        $main_menu = 'master';
        $sub_menu = 'reststop';

        return view('admin.master.rest_stop.index', compact('page', 'main_menu', 'sub_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = trans('pages_names.add_rest_stop');

        $main_menu = 'master';
        $sub_menu = 'reststop';

         $services = ServiceLocation::whereActive(true)->get();

        return view('admin.master.rest_stop.create', compact('page', 'main_menu', 'sub_menu','services'));
    }


    public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->restStop->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.master.rest_stop._rest', compact('results'));
    }

    
    public function store(Request $request)
    {
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('rest')->with('warning', $message);
        }
        Validator::make($request->all(), [
            'rest_stop_address' => 'required',
            'service_location_id'=>'required',
            'landmark' => 'required' 
        ])->validate();

        $created_params = $request->only(['rest_stop_address','rest_lat','rest_lng','service_location_id','landmark']);
        $created_params['active'] = 1;


        $this->restStop->create($created_params);

        $message = trans('succes_messages.rest_stop_added_succesfully');

        return redirect('rest')->with('success', $message);
    }


    public function getById(RestStop $rest)
    {

      
        $page = trans('pages_names.edit_rest_stop');

        $main_menu = 'master';
        $sub_menu = 'reststop';
        $item = $rest;
        $services =ServiceLocation::whereActive(true)->get();

        return view('admin.master.rest_stop.update', compact('item', 'page', 'main_menu', 'sub_menu','services'));
    }


  
   public function update(Request $request, RestStop $restStop)
    {
        
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('rest_stop')->with('warning', $message);
        }
        

        Validator::make($request->all(), [
            'rest_stop_address' => 'required',
            'service_location_id' => 'required',
            'landmark' => 'required',

        ])->validate();

        $updated_params = $request->all();
        $restStop->update($updated_params);
        $message = trans('succes_messages.rest_stop_updated_succesfully');
        return redirect('rest')->with('success', $message);
    }


    public function toggleStatus(RestStop $rest)
    {
        $status = $rest->isActive() ? false: true;
        $rest->update(['active' => $status]);

        $message = trans('succes_messages.rest_stop_status_changed_succesfully');
        return redirect('rest_stop')->with('success', $message);
    }

     public function delete(RestStop $rest)
    {
        $rest->delete();

        $message = trans('succes_messages.rest_stop_deleted_succesfully');
        return redirect('rest')->with('success', $message);
    }


}
