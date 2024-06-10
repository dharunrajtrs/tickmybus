<?php

namespace App\Http\Controllers\Web\Admin;
// namespace App\Http\Controllers\Web\Admin\Website;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\WebPrivacy;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class WebPrivacyController extends BaseController
{
    protected $webprivacy;

    // * @param \App\Models\Admin\WebPrivacy $webprivacy

    public function __construct(WebPrivacy $webprivacy,ImageUploaderContract $imageUploader)
    {
        $this->webprivacy = $webprivacy;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_privacy');

        $main_menu = 'website';
        $sub_menu = 'privacy';

        return view('admin.web_privacy.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {
        $page = trans('pages_names.add_privacy');

        $main_menu = 'website';
        $sub_menu = 'privacy';


        return view('admin.web_privacy.create', compact('page', 'main_menu', 'sub_menu'));
    }

    

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->webprivacy->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.web_privacy._privacy', compact('results'));
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


         if ($uploadedFile = $this->getValidatedUpload('img1', $request)) {
            $created_params['img1'] = $this->imageUploader->file($uploadedFile)
                ->saveHeroSlideImage();
        }


        $this->webprivacy->create($created_params);
        

        $message = trans('succes_messages.amenity_added_succesfully');

        // return redirect('home.update')->with('success', $message);
        return view('admin.web_privacy.index');
    }




public function getByid(WebPrivacy $webprivacy)
    {

      
        $page = trans('pages_names.edit_privacy');

        $main_menu = 'website';
        $sub_menu = 'privacy';
        // $item = WebAbout::first();
        $item = $webprivacy;


        return view('admin.web_privacy.update' , compact('item','main_menu','sub_menu','page'));
    }

    
    public function update(Request $request,WebPrivacy $webprivacy)
    {
     

        Validator::make($request->all(), [
           

        ])->validate();

    

        $updated_params = $request->all();
        

        if ($uploadedFile = $this->getValidatedUpload('hero_bg', $request)) {
            $updated_params['hero_bg'] = $this->imageUploader->file($uploadedFile)
                ->savePrivacyImage();
        }
        
        $webprivacy->update($updated_params);
        $message = trans('succes_messages.homepage_succesfully');
        return redirect('privacy')->with('success', $message);
    }

  public function toggleStatus(WebPrivacy $webprivacy)
    {
        $status = $home->isActive() ? false: true;
        $home->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('update')->with('success', $message);
    }

     public function delete(WebPrivacy $webprivacy)
    {
        $webprivacy->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('privacy')->with('success', $message);
    }




public function privacy(){

    $data = WebPrivacy::first();

    return view('landingsite.privacy', compact('data'));
}


}
