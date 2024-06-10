<?php

namespace App\Http\Controllers\Web\Admin;
// namespace App\Http\Controllers\Web\Admin\Website;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\WebHeader;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;


class WebHeaderController extends BaseController
{
    protected $webheader;

    

    public function __construct(WebHeader $webheader,ImageUploaderContract $imageUploader)
    {
        $this->webheader = $webheader;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_header');

        $main_menu = 'website';
        $sub_menu = 'header';

        return view('admin.web_header.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {
        $page = trans('pages_names.add_header');

        $main_menu = 'website';
        $sub_menu = 'header';


        return view('admin.web_header.create', compact('page', 'main_menu', 'sub_menu'));
    }

    

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->webheader->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.web_header._header', compact('results'));
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


        $this->webheader->create($created_params);
        

        $message = trans('succes_messages.amenity_added_succesfully');

        // return redirect('home.update')->with('success', $message);
        return view('admin.web_header.index');
    }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

public function getByid(WebHeader $webheader)
    {

      
        $page = trans('pages_names.edit_header');

        $main_menu = 'website';
        $sub_menu = 'header';
        // $item = WebHome::first();
        $item = $webheader;
    

// dd($webhome);

        return view('admin.web_header.update' , compact('item','main_menu','sub_menu','page'));
    }

    
    public function update(Request $request,WebHeader $webheader)
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
        if ($uploadedFile = $this->getValidatedUpload('logo', $request)) {
            $updated_params['logo'] = $this->imageUploader->file($uploadedFile)
                ->saveHeaderImage();
        }

        if ($uploadedFile = $this->getValidatedUpload('fevicon', $request)) {
            $updated_params['fevicon'] = $this->imageUploader->file($uploadedFile)
                ->saveHeaderImage();
        }
        $webheader->update($updated_params);
        // dd($updated_params);
        $message = trans('succes_messages.homepage_succesfully');
        return redirect('header')->with('success', $message);
    }

  public function toggleStatus(header $header)
    {
        $status = $header->isActive() ? false: true;
        $home->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('update')->with('success', $message);
    }

     public function delete(WebHeader $webheader)
    {
        $webheader->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('header')->with('success', $message);
    }





public function header(){

    $data = WebHeader::first();
    return view('admin.layouts.landing_header', compact('data'));
}


}
