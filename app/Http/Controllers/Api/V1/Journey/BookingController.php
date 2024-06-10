<?php

namespace App\Http\Controllers\Api\V1\Journey;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\BaseController;
use App\Models\User;
use App\Base\Constants\Auth\Role;
use Illuminate\Http\Request;
use App\Models\BoardingPoint;
use App\Models\City;
use App\Transformers\CityTransformer;
use App\Models\Admin\Journey;
use App\Transformers\Journey\JourneyTransformer;
use App\Models\Admin\FleetSeatLayout;
use App\Transformers\Journey\SeatLayoutTransformer;
use App\Models\Admin\JourneyUser;
use App\Models\Admin\JourneyPassenger;
use Kreait\Firebase\Contract\Database;
use App\Transformers\Journey\JourneyUserTransformer;
use App\Models\Admin\MetaBooking;
use App\Models\Payment\UserBankInfo;
use App\Transformers\Payment\WalletWithdrawalRequestsTransformer;
use App\Models\Payment\WalletWithdrawalRequest;
use App\Base\Filters\Admin\RequestFilter;
use App\Models\Admin\JourneyBill;
use Illuminate\Support\Str;
use App\Base\Constants\Masters\WalletRemarks;
use App\Models\Payment\OwnerWalletHistory;
use App\Models\Payment\OwnerWallet;
use App\Models\Admin\Promo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\CancelRequest;

class BookingController extends BaseController
{
    
    protected $journeyUser;

    public function __construct(JourneyUser $journeyUser, Database $database)
    {
        $this->journeyUser = $journeyUser;
        $this->database = $database;
    }
   
    /**
    __________________________________________________________________________________________________
    * Booking Api To Book Selected Bus Seats
    __________________________________________________________________________________________________
    * @bodyParam journey_id uuid required journeys id of the user
    * @bodyParam company_key string optional company key of demo
    * @bodyParam user_id uuid required auth user id
    * @bodyParam device_token string required device_token of the user
    * @bodyParam boarding_id uuid required boarding point of the user. it can be listed from Journey-list apis
    * @bodyParam drop_id uuid required Drop boarding point of the user. it can be listed from Journey-list apis
    * @bodyParam passenger   required from user app, passenger list in json format
    * @bodyParam sample passenger list 
    *[{"name":"bala","age":37,"gender":"male","deck_type":"lower","seat_no":"L1"},
    *{"name":"ram","age":37,"gender":"male","deck_type":"lower","seat_no":"L2"},
    *{"name":"test","age":37,"gender":"female","deck_type":"lower","seat_no":"L3"*}]    
    * @bodyParam 
    *
    * @return \Illuminate\Http\JsonResponse
    * @responseFile responses/auth/register.json
    */

    public function metaBooking(Request $request)
    {

        // dd($request->all());
         $passengers = json_decode($request->passenger, true);
         $journey= Journey::where('id', $request->journey_id)->first();


    foreach ($passengers as $passenger) 
        {

       $seat_id = $journey->fleet->fleetSeatLayout()->where('deck_type', $passenger['deck_type'])->where('seat_no',$passenger['seat_no'])->pluck('id');

        $meta_bookig_seat = MetaBooking::where('journey_id', $request->journey_id)->where('seat_id', $seat_id[0])->exists();

            if ($meta_bookig_seat == false) 
            {
        
                $params['journey_id'] =  $request->journey_id;
                $params['user_id'] =  $request->user_id;
                $params['seat_id'] =  $seat_id[0];


                $metaBooking = MetaBooking::create($params);
            }
        }

        return $this->respondSuccess();

    }
 
    /**
    __________________________________________________________________________________________________
    * Booking Api To Book Selected Bus Seats
    __________________________________________________________________________________________________
    * @bodyParam journey_id uuid required journeys id of the user
    * @bodyParam company_key string optional company key of demo
    * @bodyParam user_id uuid required auth user id
    * @bodyParam device_token string required device_token of the user
    * @bodyParam boarding_id uuid required boarding point of the user. it can be listed from Journey-list apis
    * @bodyParam drop_id uuid required Drop boarding point of the user. it can be listed from Journey-list apis
    * @bodyParam passenger   required from user app, passenger list in json format
    * @bodyParam sample passenger list 
    *[{"name":"bala","age":37,"gender":"male","deck_type":"lower","seat_no":"L1"},
    *{"name":"ram","age":37,"gender":"male","deck_type":"lower","seat_no":"L2"},
    *{"name":"test","age":37,"gender":"female","deck_type":"lower","seat_no":"L3"*}]    
    * @bodyParam 
    *
    * @return \Illuminate\Http\JsonResponse
    * @responseFile responses/auth/register.json
    */

     public function makeBooking(Request $request)
      {
        /*journey User*/
         $journey_params['journey_id'] = $request->journey_id; 
         $journey_params['user_id'] = $request->user_id; 
         $journey_params['boarding_id'] = $request->boarding_id; 
         $journey_params['drop_id'] = $request->drop_id; 
         $journey_params['ticket_fare'] = $request->ticket_fare; 
         $journey_params['is_paid'] = true; 
        // Get last request's ticket_number
        $ticket_number = $this->journeyUser->orderBy('created_at', 'DESC')->pluck('ticket_number')->first();
        if ($ticket_number) {
            $ticket_number = explode('_', $ticket_number);
            $ticket_number = $ticket_number[1]?:000000;
        } else {
            $ticket_number = 000000;
        }
        // Generate ticket number
        $journey_params['ticket_number'] = 'TIC_'.sprintf("%06d", $ticket_number+1);


        if($request->has('promo_code') && $request->promo_code)
        {
           $current_date = Carbon::today()->toDateTimeString();

            $promo_code = $request->promo_code;

            $boardingpoint = BoardingPoint::where('id', $request->boarding_id)->first();


             $promo_code = Promo::where('code', $promo_code)->where('to', '>', $current_date)->where('service_location_id', $boardingpoint->serviceLocations->id)->first();

             if (!$promo_code) {
                    $this->throwCustomException('provided promo code expired or invalid');
                }
            // dd($promo_code);
            $journey_params['is_promo'] = true;
            $journey_params['promo_code_id'] = $promo_code->id;
        }

// Log::info($journey_params);
         $journeyUser = JourneyUser::create($journey_params);


         $passengers = json_decode($request->passenger, true);
        /*journey Passenger*/

          foreach ($passengers as $passenger) {


             $seat_id = $journeyUser->journey->fleet->fleetSeatLayout()->where('deck_type', $passenger['deck_type'])->where('seat_no',$passenger['seat_no'])->pluck('id');

            $journey_passenger['journey_id'] =  $journeyUser->journey_id;
            $journey_passenger['journey_user_id'] =  $journeyUser->user_id;
            $journey_passenger['seat_id'] =  $seat_id[0];
            $journey_passenger['name'] =  $passenger['name'];
            $journey_passenger['gender'] =  $passenger['gender'];
            $journey_passenger['age'] =  $passenger['age'];
            $journey_passenger['ticket_number'] = 'TIC_'.sprintf("%06d", $ticket_number+1);

            $passenger1 = JourneyPassenger::create($journey_passenger);
          
           $meta_bookig_seat = MetaBooking::where('journey_id', $journeyUser->journey_id)->where('user_id',  $journeyUser->user_id)->where('seat_id', $seat_id[0])->delete();

            } 


           $calculated_bill =  $this->calculateBill($journeyUser);


          return $this->respondSuccess();
    }

    public function calculateBill($journeyUser)
    {

    /*Calculate Bills*/

        /*journeyUser*/

        $service_location = $journeyUser->boardingPoint->serviceLocations;

        $currency_code = $service_location->currency_code;
        
        $requested_currency_symbol = $service_location->currency_symbol;


            /*Promo Code*/

                if ($journeyUser->is_promo == true) 
                {
                    $coupon_detail = Promo::whereId($journeyUser->promo_code_id)->first();


                    if ($coupon_detail->minimum_ticket_amount < $journeyUser->ticket_fare) {
                        $discount_amount = $journeyUser->ticket_fare * ($coupon_detail->discount_percent/100);
                       
                        if ($coupon_detail->maximum_discount_amount>0 && $discount_amount > $coupon_detail->maximum_discount_amount) {
                            $discount_amount = $coupon_detail->maximum_discount_amount;
                            // dd($discount_amount);
                        }

                        $ticket_fare = ($journeyUser->ticket_fare) - $discount_amount;

                        $coupon_detail->promoUsers()->create(['journey_id' => $journeyUser->journey_id, 'user_id' => $journeyUser->user_id, 'promo_code_id' => $coupon_detail->id]);
                        
                        // $billParams["promo_discount"] = $discount_amount;
                      }            
                }else{
                     $ticket_fare = $journeyUser->ticket_fare;
                }

           /*Promo Code End*/


            /*admin Commision*/

             $admin_commision_type = get_settings('admin_commission_type');

             $admin_commision = get_settings('admin_commission');

            if($admin_commision_type == 1)
            {
                $convenience_fee =   ($ticket_fare*($admin_commision/100));
            }else{
               
                $convenience_fee =   $admin_commision;
            }

            /*admin company_commision*/
             $admin_commission_type_for_bus_company = get_settings('admin_commission_type_for_bus_company');

             $admin_commission_for_bus_company = get_settings('admin_commission_for_bus_company');
       
            if($admin_commission_type_for_bus_company == 1)
            {
                $service_charge =   ($ticket_fare*($admin_commission_for_bus_company/100));
            }else{
               
                $service_charge =   $admin_commission_for_bus_company;
            }

            /*calculation part*/
            $admin_commision_amount = $convenience_fee + $service_charge;


            $company_ticket_amount = $ticket_fare - $admin_commision_amount;

            $billParams = [
                    'journey_id' => $journeyUser->journey_id,
                    'user_id' => $journeyUser->user_id,
                    'admin_commision_from_user' => $convenience_fee,
                    'admin_commision_from_company' => $service_charge,
                    'total_admin_commision' => $admin_commision_amount,
                    'company_ticket_amount' => $company_ticket_amount,
                    'requested_currency_code' => $currency_code,
                    'requested_currency_symbol' => $requested_currency_symbol,
                        ];
            if ($journeyUser->is_promo == true) 
             {
                    $billParams["promo_discount"] = $discount_amount;

            }

            $journey_bill = JourneyBill::create($billParams);

            /*Owner Wallet*/
            //  $transaction_id = Str::random(6);

            //     $wallet_model = new OwnerWallet();
            //     $wallet_add_history_model = new OwnerWalletHistory();
            //     $user_id = $journeyUser->journey->fleet->owner->id;


            // $user_wallet = $wallet_model::firstOrCreate([
            //     'user_id'=>$user_id]);
            // $user_wallet->amount_added += $company_ticket_amount;
            // $user_wallet->amount_balance += $company_ticket_amount;
            // $user_wallet->save();

            // $wallet_add_history_model::create([
            //     'user_id'=>$user_id,
            //     // 'card_id'=>null,
            //     'amount'=>$company_ticket_amount,
            //     'transaction_id'=>$transaction_id,
            //     'merchant'=>null,
            //     'remarks'=>WalletRemarks::TICKET_AMOUNT_CREDITED.' '.$journeyUser->ticket_number,
            //     'is_credit'=>true]);

    /*Calculate Bills*/
    }

    /**
    __________________________________________________________________________________________________
    * Cancell Ticket Api To Cancel Selected Bus Seats
    __________________________________________________________________________________________________
    * @bodyParam user_id uuid required auth user id
    * @bodyParam device_token string required device_token of the user
    * @bodyParam ticket_number required ticket number to cancel of the user.
    * @bodyParam account_name string required account_name of the user,
    * @bodyParam account_number string required account_number of the user,
    * @bodyParam bank_code string required ifsc_code of the user,
    * @bodyParam bank_name string required bank_name of the user,
    * @bodyParam 
    *
    * @return \Illuminate\Http\JsonResponse
    * @responseFile responses/auth/register.json
    */ 
    public function cancelTicket(CancelRequest $request)
    {


/*cancellaion Fee*/

     $journeyUser = JourneyUser::where('user_id', $request->user_id)->where('ticket_number', $request->ticket_number)->first();
         
    $zoneCancellationHours = $journeyUser->boardingPoint->serviceLocations->zoneCancellationFee()->pluck('hour')->toArray();
      
      if($zoneCancellationHours)
      {
    /*Time differnece */
       
        $timezone = $journeyUser->boardingPoint->serviceLocations()->pluck('timezone')->first();
        $departureTime =strtotime($journeyUser->journey->depature_at);
        $currentTime = strtotime(Carbon::now($timezone));
        $difference = abs($currentTime - $departureTime)/3600;

    /*Time differnece */
            // dd($zoneCancellationHours);


    $lessOrEqualNumbers = array_filter($zoneCancellationHours, function($zoneCancellationHours) use ($difference) {

            return $zoneCancellationHours <= $difference;
    
    });



    $nearestLessOrEqualNumber = max($lessOrEqualNumbers);


    $zone_cancellation_fee = $journeyUser->boardingPoint->serviceLocations->zoneCancellationFee()->where('hour', $nearestLessOrEqualNumber)->first();

    $cancellatiuon_fee = ($journeyUser->ticket_fare)  * (($zone_cancellation_fee->percentage)/100);
    }else
    {
        $cancellatiuon_fee = 0;
    }

    // dd($cancellatiuon_fee);
    

/*cancellaion Fee*/


          $bank_params['user_id'] = $request->user_id;
          $bank_params['account_name'] = $request->account_name;
          $bank_params['account_no'] = $request->account_number;
          $bank_params['bank_code'] = $request->ifsc_code;
          $bank_params['bank_name'] = $request->bank_name;

          $bank_info_exists = UserBankInfo::where('user_id', $request->user_id)->exists();

          // dd($bank_params);

        if($bank_info_exists)
        {
          $bank = UserBankInfo::where('user_id', $request->user_id)->update($bank_params);

        }else
        {
          $bank = UserBankInfo::where('user_id', $request->user_id)->create($bank_params);
        }

        $today =Carbon::today()->toDateString();

        $journeyUsers = JourneyUser::where('user_id', $request->user_id)->where('ticket_number', $request->ticket_number)->get();

        foreach ($journeyUsers as $journeyUser) 
        {

            if ($journeyUser->journeyPassenger()->count() == count($request->name)) {
                $journeyUser->update([
                    'is_cancelled' => true,
                    'cancelled_at' => $today,
                    'cancelled_by' => 'user'
                ]);
            }
       
        }


// dd($journeyUser);
 
//new_delete flow
        Log::info($request);
         // $passengers = json_decode($request->passenger, true);
        /*journey Passenger*/
        if (is_array($request->name)) {
            // It's already an array
            $passengers = $request->name;
        } 

          foreach ($passengers as $passenger) 
          {

           JourneyPassenger::where('name', $passenger)->delete();

          }

//old delete flow
           // JourneyPassenger::where('ticket_number', $request->ticket_number)->where('name',$request->name)->delete();
        
            $currency_code = $journeyUser->user->countryDetail->currency_code;
            $currency_symbol = $journeyUser->user->countryDetail->currency_symbol;
            $created_params['requested_currency'] = $currency_code;

            $created_params['user_id'] = $request->user_id;

            $created_params['requested_amount'] = $cancellatiuon_fee;
           
            WalletWithdrawalRequest::create($created_params);

         return $this->respondSuccess();
       

    }


    public function search()
    {
        
    }


}
