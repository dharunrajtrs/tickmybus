<?php

namespace App\Http\Controllers\Web\Master;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Amenity;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class AmenityController extends BaseController
{
    protected $amenity;

    // * @param \App\Models\Amenity $amenity

    public function __construct(Amenity $make,ImageUploaderContract $imageUploader)
    {
        $this->make = $make;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_amenity');

        $main_menu = 'master';
        $sub_menu = 'amenity';

        return view('admin.master.amenity.index', compact('page', 'main_menu', 'sub_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = trans('pages_names.add_amenity');

        $main_menu = 'master';
        $sub_menu = 'amenity';


        return view('admin.master.amenity.create', compact('page', 'main_menu', 'sub_menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->make->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.master.amenity._amenity', compact('results'));
    }

    public function store(Request $request)
    {

        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('amenity')->with('warning', $message);
        }

        Validator::make($request->all(), [
            'name' => 'required|unique:amenities,name',
            'icon'=>'required'
        
        ])->validate();


        $created_params = $request->only(['name']);
        $created_params['active'] = 1;

         if ($uploadedFile = $this->getValidatedUpload('icon', $request)) {
            $created_params['icon'] = $this->imageUploader->file($uploadedFile)
                ->saveAmenityTypeImage();
        }


        $this->make->create($created_params);

        $message = trans('succes_messages.amenity_added_succesfully');

        return redirect('amenity')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function getById(Amenity $amenity)
    {

      
        $page = trans('pages_names.edit_amenity');

        $main_menu = 'master';
        $sub_menu = 'amenity';
        $item = $amenity;
        // $services =ServiceLocation::whereActive(true)->get();

        return view('admin.master.amenity.update', compact('item', 'page', 'main_menu', 'sub_menu'));
    }

    
    public function update(Request $request,Amenity $amenity)
    {
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('amenity')->with('warning', $message);
        }
        

        Validator::make($request->all(), [
            // 'route_id' => 'required',
            'name' => 'required',
            'icon' => 'required',

        ])->validate();

        $updated_params = $request->only(['name']);
        

        if ($uploadedFile = $this->getValidatedUpload('icon', $request)) {
            $updated_params['icon'] = $this->imageUploader->file($uploadedFile)
                ->saveAmenityTypeImage();
        }
        $amenity->update($updated_params);

        $message = trans('succes_messages.boarding_updated_succesfully');
        return redirect('amenity')->with('success', $message);
    }

  public function toggleStatus(Amenity $amenity)
    {
        $status = $amenity->isActive() ? false: true;
        $amenity->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('amenity')->with('success', $message);
    }

     public function delete(Amenity $amenity)
    {
        $amenity->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('amenity')->with('success', $message);
    }
}
