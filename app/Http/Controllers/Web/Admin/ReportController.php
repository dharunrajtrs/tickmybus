<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\User;
use App\Exports\UsersExport;
use App\Models\Admin\Driver;
use Illuminate\Http\Request;
use App\Exports\TravelExport;
use App\Base\Constants\Auth\Role;
use Illuminate\Support\Facades\DB;
use App\Exports\DriverDutiesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Base\Filters\Admin\UserFilter;
use App\Base\Filters\Admin\RequestFilter;
use App\Base\Constants\Masters\DateOptions;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Models\Request\Request as RequestRequest;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use Carbon\Carbon;
use App\Models\Admin\Owner;
use App\Exports\OwnerExport;
use App\Base\Filters\Admin\OwnerFilter;

class ReportController extends Controller
{
    protected $format = ['xlsx','xls','csv','pdf'];

    public function userReport()
    {
        $page = trans('pages_names.user_report');

        $main_menu = 'reports';
        $sub_menu = 'user_report';
        $formats = $this->format;

        return view('admin.reports.user_report', compact('page', 'main_menu', 'sub_menu', 'formats'));
    }

    public function ownerReport()
    {
        $page = trans('pages_names.owner_report');

        $main_menu = 'reports';
        $sub_menu = 'owner_report';
        $formats = $this->format;

        return view('admin.reports.owner_report', compact('page', 'main_menu', 'sub_menu', 'formats'));
    }

    public function travelReport()
    {
        $page = trans('pages_names.finance_report');

        $main_menu = 'reports';
        $sub_menu = 'travel_report';
        $formats = $this->format;

        return view('admin.reports.travel_report', compact('page', 'main_menu', 'sub_menu', 'formats'));
    }

    public function downloadReport(Request $request, QueryFilterContract $queryFilter)
    {

        $method = "download".$request->model."Report";

        $filename = $this->$method($request, $queryFilter);

        $file = url('storage/'.$filename);

        return $file;
    }

    public function downloadUserReport(Request $request, QueryFilterContract $queryFilter)
    {
        $format = $request->format;

        $query = User::companyKey()->belongsToRole(Role::USER);

        $data = $queryFilter->builder($query)->customFilter(new UserFilter)->defaultSort('-date')->get();

        $filename = "$request->model Report-".date('ymdis').'.'.$format;

        Excel::store(new UsersExport($data), $filename, 'local');

        return $filename;
    }

    public function downloadTravelReport(Request $request, QueryFilterContract $queryFilter)
    {
        $format = $request->format;

        $query = RequestRequest::companyKey();

        $data = $queryFilter->builder($query)->customFilter(new RequestFilter)->defaultSort('created_at')->get();

        $filename = "$request->model Report-".date('ymdis').'.'.$format;

        Excel::store(new TravelExport($data), $filename, 'local');

        return $filename;
    }
    public function downloadOwnerReport(Request $request, QueryFilterContract $queryFilter)
    {
     
     $format = $request->format;

        $query = Owner::query();
        if (env('APP_FOR')=='demo') {
            $query = Owner::whereHas('owner_id', function ($query) {
                $query->where('active', $request->status);
            });
        }

        $data = $queryFilter->builder($query)->customFilter(new OwnerFilter)->defaultSort('-date')->get();

        $filename = "$request->model Report-".date('ymdis').'.'.$format;

        Excel::store(new OwnerExport($data), $filename, 'local');

        return $filename;
    }
}
