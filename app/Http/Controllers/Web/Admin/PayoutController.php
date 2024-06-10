<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\BaseController;
use App\Models\Admin\ServiceLocation;
use Illuminate\Http\Request;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Base\Constants\Taxi\DriverDocumentStatus;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Filters\Taxi\OwnerFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Exports\CommonReportExport;
use App\Http\Requests\Taxi\Owner\StoreOwnerRequest;
use App\Http\Requests\Taxi\Owner\UpdateOwnerRequest;
use App\Jobs\Notifications\Auth\EmailConfirmationNotification;
use App\Models\Admin\Owner;
use App\Models\Admin\OwnerDocument;
use App\Models\Admin\OwnerNeededDocument;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Kreait\Firebase\Contract\Database;


class PayoutController extends BaseController
{
    /**
     * The Owner model instance.
     *
     * @var \App\Models\Admin\Owner
     */
    protected $owner;

    /**
     * The User model instance.
     *
     * @var \App\Models\User
     */
    protected $user;

    protected $imageUploader;
    /**
     * OwnerController constructor.
     *
     * @param \App\Models\Admin\Owner $owner
     */
    public function __construct(Owner $owner, User $user,ImageUploaderContract $imageUploader,Database $database)
    {
        $this->owner = $owner;
        $this->user = $user;
        $this->imageUploader = $imageUploader;
        $this->database = $database;

    }

    public function index()
    {
        $page = trans('pages_names.view_promo');

        $main_menu = 'manage-payouts';
        $sub_menu = 'manage-owner-payouts';

        return view('admin.payouts.index', compact('page', 'main_menu', 'sub_menu'));
    }

}
