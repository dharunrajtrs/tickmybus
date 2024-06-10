<?php

namespace App\Http\Controllers\Web\Admin;
// namespace App\Http\Controllers\Web\Admin\Website;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\WebService;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class WebServiceController extends BaseController
{
    protected $webservice;

    // * @param \App\Models\Admin\Webhome $webhome

    public function __construct(WebService $webservice,ImageUploaderContract $imageUploader)
    {
        $this->webservice = $webservice;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_service');

        $main_menu = 'website';
        $sub_menu = 'service';

        return view('admin.web_service.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {
        $page = trans('pages_names.add_service');

        $main_menu = 'website';
        $sub_menu = 'service';


        return view('admin.web_service.create', compact('page', 'main_menu', 'sub_menu'));
    }

    

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->webservice->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.web_service._service', compact('results'));
    }

    public function store(Request $request)
    {

        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('update')->with('warning', $message);
        }

        Validator::make($request->all(), [
           
        
        ])->validate();

        $created_params = $request->only(['title','short_title',]);
        // $created_params['active'] = 1;

         if ($uploadedFile = $this->getValidatedUpload('img1', $request)) {
            $created_params['img1'] = $this->imageUploader->file($uploadedFile)
                ->saveHeroSlideImage();
        }


        $this->webservice->create($created_params);
        

        $message = trans('succes_messages.amenity_added_succesfully');

        // return redirect('home.update')->with('success', $message);
        return view('admin.web_service.index');
    }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

public function getByid(WebService $webservice)
    {

      
        $page = trans('pages_names.edit_service');

        $main_menu = 'website';
        $sub_menu = 'service';
        // $item = WebHome::first();
        $item = $webservice;
// dd($webhome);

        return view('admin.web_service.update' , compact('item','main_menu','sub_menu','page'));
    }

    
    public function update(Request $request,WebService $webservice)
    {
        // if (env('APP_FOR')=='demo') {
        //     $message = trans('succes_messages.you_are_not_authorised');

        //     return redirect('update')->with('warning', $message);
        // }

        Validator::make($request->all(), [
   

        ])->validate();

        // dd($request->all());

        $updated_params = $request->all();
        
// dd($updated_params);
        if ($uploadedFile = $this->getValidatedUpload('hero_bg', $request)) {
            $updated_params['hero_bg'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service1_img', $request)) {
            $updated_params['service1_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service2_img', $request)) {
            $updated_params['service2_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service3_img', $request)) {
            $updated_params['service3_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service4_img', $request)) {
            $updated_params['service4_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service_img', $request)) {
            $updated_params['service_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity1_img', $request)) {
            $updated_params['amenity1_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity2_img', $request)) {
            $updated_params['amenity2_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity3_img', $request)) {
            $updated_params['amenity3_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity4_img', $request)) {
            $updated_params['amenity4_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity5_img', $request)) {
            $updated_params['amenity5_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity6_img', $request)) {
            $updated_params['amenity6_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity7_img', $request)) {
            $updated_params['amenity7_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity8_img', $request)) {
            $updated_params['amenity8_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('amenity9_img', $request)) {
            $updated_params['amenity9_img'] = $this->imageUploader->file($uploadedFile)
                ->saveServiceImage();
        }
        $webservice->update($updated_params);
        $message = trans('succes_messages.homepage_succesfully');
        return redirect('service')->with('success', $message);
    }

  public function toggleStatus(Home $home)
    {
        $status = $home->isActive() ? false: true;
        $home->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('update')->with('success', $message);
    }

     public function delete(WebService $webservice)
    {
        $webservice->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('service')->with('success', $message);
    }





public function service(){

    $data = WebService::first();

    return view('landingsite.services', compact('data'));
}


}
