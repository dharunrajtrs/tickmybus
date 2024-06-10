<?php

namespace App\Http\Controllers\Web\Admin;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Controllers\Web\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Base\Services\ImageUploader\ImageUploaderContract;

class WebBookingController extends BaseController
{
    protected $webterm;

  

    public function __construct(ImageUploaderContract $imageUploader)
    {
        $this->imageUploader = $imageUploader;

    }

    public function index()
    {
        $page = trans('pages_names.view_term');

        $main_menu = 'web_booking';
        $sub_menu = 'term';

        return view('admin.web_booking.index', compact('page', 'main_menu', 'sub_menu'));
    }


}
