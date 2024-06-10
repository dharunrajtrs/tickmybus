<?php

namespace App\Http\Controllers\Web\Admin;
// namespace App\Http\Controllers\Web\Admin\Website;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\WebAbout;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class WebAboutController extends BaseController
{
    protected $webabout;

    // * @param \App\Models\Admin\WebAbout $webabout

    public function __construct(WebAbout $webabout,ImageUploaderContract $imageUploader)
    {
        $this->webabout = $webabout;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_about');

        $main_menu = 'website';
        $sub_menu = 'about';

        return view('admin.web_about.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {
        $page = trans('pages_names.add_about');

        $main_menu = 'website';
        $sub_menu = 'about';


        return view('admin.web_about.create', compact('page', 'main_menu', 'sub_menu'));
    }

    

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->webabout->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.web_about._about', compact('results'));
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


        $this->webabout->create($created_params);
        

        $message = trans('succes_messages.amenity_added_succesfully');

        // return redirect('home.update')->with('success', $message);
        return view('admin.web_about.index');
    }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

public function getByid(WebAbout $webabout)
    {

      
        $page = trans('pages_names.edit_about');

        $main_menu = 'website';
        $sub_menu = 'about';
        // $item = WebAbout::first();
        $item = $webabout;
// dd($webabout);

        return view('admin.web_about.update' , compact('item','main_menu','sub_menu','page'));
    }

    
    public function update(Request $request,WebAbout $webabout)
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
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('about_img', $request)) {
            $updated_params['about_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('driver1_img', $request)) {
            $updated_params['driver1_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('driver2_img', $request)) {
            $updated_params['driver2_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('driver3_img', $request)) {
            $updated_params['driver3_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('driver4_img', $request)) {
            $updated_params['driver4_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service1_img', $request)) {
            $updated_params['service1_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service2_img', $request)) {
            $updated_params['service2_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service3_img', $request)) {
            $updated_params['service3_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service4_img', $request)) {
            $updated_params['service4_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('service_img', $request)) {
            $updated_params['service_img'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('banner_bg', $request)) {
            $updated_params['banner_bg'] = $this->imageUploader->file($uploadedFile)
                ->saveAboutImage();
        }
        $webabout->update($updated_params);
        $message = trans('succes_messages.homepage_succesfully');
        return redirect('about')->with('success', $message);
    }

  public function toggleStatus(WebAbout $webabout)
    {
        $status = $home->isActive() ? false: true;
        $home->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('update')->with('success', $message);
    }

     public function delete(WebAbout $webabout)
    {
        $webabout->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('about')->with('success', $message);
    }



public function about(){

    $data = WebAbout::first();

    return view('landingsite.about', compact('data'));
}


}
