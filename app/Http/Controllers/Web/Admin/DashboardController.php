<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Web\BaseController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Base\Constants\Setting\Settings;
use URL;
use App\Models\Admin\Owner;
use App\Models\Admin\Fleet;
use App\Models\Admin\Journey;
use App\Models\Admin\JourneyBill;



class DashboardController extends BaseController
{

    public function dashboard()
    {

        $owners = Owner::selectRaw('IFNULL(SUM(CASE WHEN approve=1 THEN 1 ELSE 0 END),0) AS approved, IFNULL((SUM(CASE WHEN approve=1 THEN 1 ELSE 0 END) / count(*)),0) * 100 AS approve_percentage, IFNULL((SUM(CASE WHEN approve=0 THEN 1 ELSE 0 END) / count(*)),0) * 100 AS decline_percentage,IFNULL(SUM(CASE WHEN approve=0 THEN 1 ELSE 0 END),0) AS declined,count(*) AS total
                                    ')->whereHas('user', function ($query) {$query->companyKey();
                                    });
              $total_owners = $owners->get();


        $fleets = Fleet::all();

        $total_users = User::belongsToRole('user')->companyKey()->count();

        $completed_journeys = Journey::where('is_completed', true)->get();


// currency symbol

     if (auth()->user()->countryDetail) {
            $currency = auth()->user()->countryDetail->currency_symbol;
        } else {
            $currency = get_settings(Settings::CURRENCY);
        }
        $currency = get_settings('currency_code');

        $today = Carbon::today()->toDateString();


// Today Earnings

    /*card datas*/
            $todayEarnings =Journey::leftJoin('journey_bills','journeys.id','journey_bills.journey_id')->where('journeys.is_completed',true)->whereDate('journeys.completed_at',$today)->pluck('total_admin_commision')->sum();

            $userAdminCommision = Journey::leftJoin('journey_bills','journeys.id','journey_bills.journey_id')->where('journeys.is_completed',true)->whereDate('journeys.completed_at',$today)->pluck('admin_commision_from_user')->sum();

            $companyAdminCommision = Journey::leftJoin('journey_bills','journeys.id','journey_bills.journey_id')->where('journeys.is_completed',true)->whereDate('journeys.completed_at',$today)->pluck('admin_commision_from_company')->sum();
    /*card datas ends*/

            /*Journeys*/
            $todayJourneys = Journey::selectRaw('
                IFNULL(SUM(CASE WHEN is_completed=1 AND is_trip_start=1 THEN 1 ELSE 0 END),0) AS today_completed,
                IFNULL(SUM(CASE WHEN is_completed=0 AND is_trip_start=0 THEN 1 ELSE 0 END),0) AS today_scheduled')
            ->whereDate('arrived_at', $today)
            ->get();
           
           $todayCancelledJourneys = Journey::selectRaw('
                IFNULL(SUM(CASE WHEN is_cancelled=1 AND is_trip_start=0 THEN 1 ELSE 0 END),0) AS today_cancelled')
            ->whereDate('cancelled_at', $today)
            ->get();

            /*journeys*/

//Today Earnings


/*Over All Earnings*/

    /*card datas*/
            $ovearAllEarnings =Journey::leftJoin('journey_bills','journeys.id','journey_bills.journey_id')->where('journeys.is_completed',true)->pluck('total_admin_commision')->sum();

            $ovearAlluserAdminCommision = Journey::leftJoin('journey_bills','journeys.id','journey_bills.journey_id')->where('journeys.is_completed',true)->pluck('admin_commision_from_user')->sum();

            $ovearAllcompanyAdminCommision = Journey::leftJoin('journey_bills','journeys.id','journey_bills.journey_id')->where('journeys.is_completed',true)->pluck('admin_commision_from_company')->sum();
    /*card datas*/


         $startDate = Carbon::now()->startOfMonth()->subMonths(6);
         $endDate = Carbon::now();
         $data=[];
        while ($startDate->lte($endDate)){

        $from = Carbon::parse($startDate)->startOfMonth();        
        $to = Carbon::parse($startDate)->endOfMonth();        
        $shortName = $startDate->shortEnglishMonth;

                $monthName = $startDate->monthName;                
                $data['cancel'][] = [
                    'y' => $shortName,
                    'a' => Journey::whereBetween('created_at', [$from,$to])->whereIsCancelled(true)->count(),
                    'u' => Journey::whereBetween('created_at', [$from,$to])->whereIsCancelled(true)->count(),
                    'd' => Journey::whereBetween('created_at', [$from,$to])->whereIsCancelled(true)->count()
                ];

                $data['earnings']['months'][] = $monthName;


                $data['earnings']['values'][] = JourneyBill::whereHas('journeyDetail', function ($query) use ($from,$to) {
                                                            $query->whereBetween('started_at', [$from,$to])->whereIsCompleted(true);
                                                        })->sum('total_admin_commision');
                  $startDate->addMonth();

                }

/*Over All Earnings Ends */

            $journeys = Journey::selectRaw('
                IFNULL(SUM(CASE WHEN is_completed=1 THEN 1 ELSE 0 END),0) AS today_completed,
                IFNULL(SUM(CASE WHEN is_cancelled=1 THEN 1 ELSE 0 END),0) AS today_cancelled,
                IFNULL(SUM(CASE WHEN is_completed=0  THEN 1 ELSE 0 END),0) AS today_scheduled,
                IFNULL(SUM(CASE WHEN is_cancelled=1  THEN 1 ELSE 0 END),0) AS auto_cancelled,
                IFNULL(SUM(CASE WHEN is_cancelled=1  THEN 1 ELSE 0 END),0) AS user_cancelled,
                IFNULL(SUM(CASE WHEN is_cancelled=1  THEN 1 ELSE 0 END),0) AS driver_cancelled,
                (IFNULL(SUM(CASE WHEN is_cancelled=1  THEN 1 ELSE 0 END),0) +
                IFNULL(SUM(CASE WHEN is_cancelled=1  THEN 1 ELSE 0 END),0) +
                IFNULL(SUM(CASE WHEN is_cancelled=1  THEN 1 ELSE 0 END),0)) AS total_cancelled
            ')
            ->whereDate('started_at',$today)
            ->get();
/*cancell cart Data*/

         $startDate1 = Carbon::now()->startOfMonth()->subMonths(6);
         $endDate1 = Carbon::now();
         $cancelData=[];

        while ($startDate1->lte($endDate1)){

        $from = Carbon::parse($startDate1)->startOfMonth();        
        $to = Carbon::parse($startDate1)->endOfMonth();        
        $shortName = $startDate1->shortEnglishMonth;


                $monthName = $startDate1->monthName;                
                $cancelData['cancel'][] = [
                    'y' => $shortName,
                    'a' => JourneyBill::whereBetween('created_at', [$from,$to])->whereIsCancelled(true)->count(),
                    'u' => JourneyBill::whereBetween('created_at', [$from,$to])->whereIsCancelled(true)->count(),
                    'd' => JourneyBill::whereBetween('created_at', [$from,$to])->whereIsCancelled(true)->count()
                ];

                $cancelData['earnings']['months'][] = $monthName;


                $cancelData['earnings']['values'][] = JourneyBill::whereHas('journeyDetail', function ($query) use ($from,$to) {
                                                            $query->whereBetween('started_at', [$from,$to])->whereIsCompleted(true);
                                                        })->sum('total_admin_commision');
                  $startDate1->addMonth();

                }
/*cancell cart Data*/

    $totalCancelled_bookings = JourneyBill::where('created_at', [$from,$to])->whereIsCancelled(true)->count();


// dd($totalCancelled_bookings);

        return view('admin.dashboard', compact('total_owners','fleets', 'total_users', 'currency','todayEarnings','todayJourneys','todayCancelledJourneys','data','completed_journeys', 'userAdminCommision','companyAdminCommision','ovearAllEarnings','ovearAlluserAdminCommision','ovearAllcompanyAdminCommision','journeys','cancelData','totalCancelled_bookings'));
    }
}
