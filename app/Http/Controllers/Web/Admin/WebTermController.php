<?php

namespace App\Http\Controllers\Web\Admin;
// namespace App\Http\Controllers\Web\Admin\Website;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\WebTerm;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class WebTermController extends BaseController
{
    protected $webterm;

  

    public function __construct(WebTerm $webterm,ImageUploaderContract $imageUploader)
    {
        $this->webterm = $webterm;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_term');

        $main_menu = 'website';
        $sub_menu = 'term';

        return view('admin.web_term.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {
        $page = trans('pages_names.add_term');

        $main_menu = 'website';
        $sub_menu = 'term';


        return view('admin.web_term.create', compact('page', 'main_menu', 'sub_menu'));
    }

    

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->webterm->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.web_term._term', compact('results'));
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


        $this->webterm->create($created_params);
        

        $message = trans('succes_messages.amenity_added_succesfully');

        // return redirect('home.update')->with('success', $message);
        return view('admin.web_term.index');
    }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

public function getByid(WebTerm $webterm)
    {

      
        $page = trans('pages_names.edit_term');

        $main_menu = 'website';
        $sub_menu = 'term';
        // $item = WebAbout::first();
        $item = $webterm;
// dd($webterm);

        return view('admin.web_term.update' , compact('item','main_menu','sub_menu','page'));
    }

    
    public function update(Request $request,WebTerm $webterm)
    {
      

        Validator::make($request->all(), [
          
        ])->validate();

        // dd($request->all());

        $updated_params = $request->all();
        
// dd($updated_params);
        if ($uploadedFile = $this->getValidatedUpload('hero_bg', $request)) {
            $updated_params['hero_bg'] = $this->imageUploader->file($uploadedFile)
                ->saveTermImage();
        }

        $webterm->update($updated_params);
        $message = trans('succes_messages.homepage_succesfully');
        return redirect('term')->with('success', $message);
    }

  public function toggleStatus(WebTerm $webterm)
    {
        $status = $home->isActive() ? false: true;
        $home->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('update')->with('success', $message);
    }

     public function delete(WebAbout $webterm)
    {
        $webterm->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('term')->with('success', $message);
    }




public function terms(){

    $data = WebTerm::first();

    return view('landingsite.terms', compact('data'));
}

}
