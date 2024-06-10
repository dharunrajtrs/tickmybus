<?php

namespace App\Http\Controllers\Web\Admin;
// namespace App\Http\Controllers\Web\Admin\Website;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\WebContact;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;


class WebContactController extends BaseController
{
    protected $webcontact;

    

    public function __construct(WebContact $webcontact,ImageUploaderContract $imageUploader)
    {
        $this->webcontact = $webcontact;
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_contact');

        $main_menu = 'website';
        $sub_menu = 'contact';

        return view('admin.web_contact.index', compact('page', 'main_menu', 'sub_menu'));
    }

    
    public function create()
    {
        $page = trans('pages_names.add_contact');

        $main_menu = 'website';
        $sub_menu = 'contact';


        return view('admin.web_contact.create', compact('page', 'main_menu', 'sub_menu'));
    }

    

     public function fetch(QueryFilterContract $queryFilter)
    {

        $query = $this->webcontact->query();//->active()
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.web_contact._contact', compact('results'));
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


        $this->webcontact->create($created_params);
        

        $message = trans('succes_messages.amenity_added_succesfully');

        // return redirect('home.update')->with('success', $message);
        return view('admin.web_contact.index');
    }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */

public function getByid(WebContact $webcontact)
    {

      
        $page = trans('pages_names.edit_contact');

        $main_menu = 'website';
        $sub_menu = 'contact';
        // $item = WebHome::first();
        $item = $webcontact;
    

// dd($webhome);

        return view('admin.web_contact.update' , compact('item','main_menu','sub_menu','page'));
    }

    
    public function update(Request $request,WebContact $webcontact)
    {
        // if (env('APP_FOR')=='demo') {
        //     $message = trans('succes_messages.you_are_not_authorised');

        //     return redirect('update')->with('warning', $message);
        // }

        Validator::make($request->all(), [
            // 'phone' => 'required','address' => 'required','email' => 'required',
            // 'form_title' => 'required',
            // // 'hero_bg' =>'required',
            

        ])->validate();

        // dd($request->all());
        if ($uploadedFile = $this->getValidatedUpload('hero_bg', $request)) {
            $updated_params['hero_bg'] = $this->imageUploader->file($uploadedFile)
                ->saveContactImage();
        }
        if ($uploadedFile = $this->getValidatedUpload('form_img', $request)) {
            $updated_params['form_img'] = $this->imageUploader->file($uploadedFile)
                ->saveContactImage();
        }

        $updated_params = $request->all();
        
// dd($updated_params);
       
        $webcontact->update($updated_params);
        // dd($updated_params);
        $message = trans('succes_messages.homepage_succesfully');
        return redirect('contact')->with('success', $message);
    }

  public function toggleStatus(Contact $contact)
    {
        $status = $contact->isActive() ? false: true;
        $home->update(['active' => $status]);

        $message = trans('succes_messages.boarding_status_changed_succesfully');
        return redirect('update')->with('success', $message);
    }

     public function delete(WebContact $webcontact)
    {
        $webcontact->delete();

        $message = trans('succes_messages.boarding_deleted_succesfully');
        return redirect('contact')->with('success', $message);
    }





public function contact(){

    $data = WebContact::first();
    // $p=Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(),''));
    return view('landingsite.contact-us', compact('data'));
}


}
