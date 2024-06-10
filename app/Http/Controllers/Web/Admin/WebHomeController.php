<?php

namespace App\Http\Controllers\Web\Admin;
// namespace App\Http\Controllers\Web\Admin\Website;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\WebHome;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Storage;

class WebHomeController extends BaseController
{
    protected $webhome;

    // * @param \App\Models\Admin\Webhome $webhome

    public function __construct(WebHome $webhome,ImageUploaderContract $imageUploader)
    {
        $this->webhome = $webhome;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_home');

        $main_menu = 'website';
        $sub_menu = 'home';

        return view('admin.web_home.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {
        $page = trans('pages_names.add_home');

        $main_menu = 'website';
        $sub_menu = 'home';


        return view('admin.web_home.create', compact('page', 'main_menu', 'sub_menu'));
    }

    

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->webhome->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.web_home._home', compact('results'));
    }

    public function store(Request $request)
    {

        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('update')->with('warning', $message);
        }

        Validator::make($request->all(), [
            'hero_title_1' => 'required',
            'hero_short_title_1' => 'required',
            'hero_img1' => 'required',
            'hero_title_2' => 'required',
            'hero_short_title_2' => 'required',
            'hero_img2' => 'required',
            'hero_title_3' => 'required',
            'hero_short_title_3' => 'required',
            'hero_img2' => 'required',
            'hero_booknow' => 'required',
            'about_title' => 'required',
            'about_us' => 'required',
            'about_para' => 'required',
        
        ])->validate();

        $created_params = $request->only(['title','short_title',]);
        // $created_params['active'] = 1;

         if ($uploadedFile = $this->getValidatedUpload('hero_img1', $request)) {
            $created_params['hero_img1'] = $this->imageUploader->file($uploadedFile)
                ->saveHeroSlideImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('hero_img2', $request)) {
            $created_params['hero_img2'] = $this->imageUploader->file($uploadedFile)
                ->saveHeroSlideImage();
        }


        $this->webhome->create($created_params);
        

        $message = trans('succes_messages.amenity_added_succesfully');

        // return redirect('home.update')->with('success', $message);
        return view('admin.web_home.index');
    }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

public function getByid(WebHome $webhome)
    {

      
        $page = trans('pages_names.edit_home');

        $main_menu = 'website';
        $sub_menu = 'home';
        // $item = WebHome::first();
        $item = $webhome;
// dd($webhome);

        return view('admin.web_home.update' , compact('item','main_menu','sub_menu','page'));
    }

    
    public function update(Request $request,WebHome $webhome)
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
        if ($uploadedFile = $this->getValidatedUpload('hero_img1', $request)) {
            $updated_params['hero_img1'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('hero_img2', $request)) {
            $updated_params['hero_img2'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('hero_img3', $request)) {
            $updated_params['hero_img3'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('about_img', $request)) {
            $updated_params['about_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('banner1_bg', $request)) {
            $updated_params['banner1_bg'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('sleeper1_img', $request)) {
            $updated_params['sleeper1_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('sleeper2_img', $request)) {
            $updated_params['sleeper2_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('sleeper3_img', $request)) {
            $updated_params['sleeper3_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('semi_sleeper1_img', $request)) {
            $updated_params['semi_sleeper1_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('semi_sleeper2_img', $request)) {
            $updated_params['semi_sleeper2_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('semi_sleeper3_img', $request)) {
            $updated_params['semi_sleeper3_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('seater1_img', $request)) {
            $updated_params['seater1_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('seater2_img', $request)) {
            $updated_params['seater2_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('seater3_img', $request)) {
            $updated_params['seater3_img'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('banner2_bg', $request)) {
            $updated_params['banner2_bg'] = $this->imageUploader->file($uploadedFile)
                ->saveHomeImage();
        }
        $webhome->update($updated_params);
        $message = trans('succes_messages.homepage_succesfully');
        return redirect('home')->with('success', $message);
    }

  public function toggleStatus(Home $home)
    {
        $status = $home->isActive() ? false: true;
        $home->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('update')->with('success', $message);
    }

     public function delete(WebHome $webhome)
    {
        $webhome->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('home')->with('success', $message);
    }




public function homepage(){

    $data = WebHome::first();
   
    return view('landingsite.index', compact('data'));
}


}
