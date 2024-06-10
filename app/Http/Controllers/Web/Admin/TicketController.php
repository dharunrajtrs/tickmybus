<?php

namespace App\Http\Controllers\Web\Admin;

use Carbon\Carbon;
use App\Models\Country;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Web\BaseController;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Models\Admin\JourneyUser;
use App\Models\Admin\JourneyPassenger;
use App\Models\Payment\WalletWithdrawalRequest;
use App\Models\User;
use App\Models\Payment\UserWallet;
use App\Base\Constants\Masters\WalletRemarks;

class TicketController extends BaseController
{
    protected $journeyUser;

    /**
     * FaqController constructor.
     *
     * @param \App\Models\Admin\Faq $faq
     */
    public function __construct(JourneyUser $journeyUser)
    {
        $this->journeyUser = $journeyUser;
    }


    /**
     * The User model instance.
     *
     * @var \App\Models\User
     */
    protected $imageUploader;

    /**
     * User Details Controller constructor.
     *
     * @param \App\Models\Admin\Ticket $user_details
     */
    /**
    * Get all ticket
    * @return \Illuminate\Http\JsonResponse
    */
    public function ticketsBoooked()
    {
        $page = trans('pages_names.ticket');

        $main_menu = 'tickets';
        $sub_menu = 'booked_tickets';

        return view('admin.tickets.index', compact('page', 'main_menu', 'sub_menu'));
    }
    public function fetch()
    {

        $results = JourneyUser::where('is_cancelled', false)->orderBy('ticket_number', 'desc')->paginate(10);

        return view('admin.tickets._tickets', compact('results'));
    }
    public function passengers(JourneyUser $journeyUser)
    {

        $results = $journeyUser->journeyPassenger()->paginate();

        $page = trans('pages_names.zone_type_package');

        $main_menu = 'tickets';
        $sub_menu = 'passengers';

        return view('admin.tickets.passenger_list', compact('results', 'page', 'main_menu', 'sub_menu', 'journeyUser'));
    }
    public function cancelledTickets()
    {
        $page = trans('pages_names.cancelled_tickets');

        $main_menu = 'tickets';
        $sub_menu = 'cancelled_tickets';

        return view('admin.tickets.cancelled_tickets', compact('page', 'main_menu', 'sub_menu'));
    }
    public function cancelledTicketFetch()
    {

        $results = JourneyUser::where('is_cancelled', true)->paginate(10);

        return view('admin.tickets._cancelledTickets', compact('results'));
    }
    public function refundRequest()
    {
        $page = trans('pages_names.refund_request');

        $main_menu = 'tickets';
        $sub_menu = 'refund_request';
       
        $history = WalletWithdrawalRequest::all();

        return view('admin.tickets.refund_request', compact('page', 'main_menu', 'sub_menu','history'));
    }
// refundRequestView
    public function refundRequestView(User $user)
    {
         $page = trans('pages_names.refund_requests');
        $main_menu = 'refund_requests';
        $sub_menu = '';

        $bankInfo = $user->bankInfo;

        $history = WalletWithdrawalRequest::where('user_id', $user->id,function($query){
            $query->companyKey();
        })->orderBy('created_at','desc')->paginate(20);

        $bankInfo = $user->bankInfo;

        // $amount = UserWallet::where('user_id',$user->id)->first();

        //  $card = [];

        // $card['balance_amount'] = ['name' => 'balance_amount', 'display_name' => 'Balance Amount', 'count' => $amount->amount_balance, 'icon' => 'fa fa-ban text-red'];

        return view('admin.tickets.refund_request_view', compact('page', 'main_menu', 'sub_menu','history', 'bankInfo'));
    }
  /**
     * Approve Refund Request
     *
     *
     * */   
    public function approveRefundRequest(WalletWithdrawalRequest $wallet_withdrawal_request)
    {


        $user_wallet = UserWallet::firstOrCreate([
            'user_id'=>$wallet_withdrawal_request->user_id]);
        $user_wallet->amount_added += $wallet_withdrawal_request->requested_amount;
        $user_wallet->amount_balance += $wallet_withdrawal_request->requested_amount;
        $user_wallet->save();

         $user_wallet_history = $wallet_withdrawal_request->userDetail->userWalletHistory()->create([
                'amount'=>$wallet_withdrawal_request->requested_amount,
                'transaction_id'=>str_random(6),
                'remarks'=>WalletRemarks::AMOUNT_REFUNDED,
                'is_credit'=>true
            ]);


         $wallet_withdrawal_request->status = 1;
         $wallet_withdrawal_request->save();

        $message = "Refund request approved successfully";

        return redirect()->back()->with('success', $message);

    }

 /**
     * Decline Refund Request
     *
     *
     * */
    public function declineRefundRequest(WalletWithdrawalRequest $wallet_withdrawal_request){

        $wallet_withdrawal_request->status = 2;
        $wallet_withdrawal_request->save();

        $message = "Refund request declined successfully";

        return redirect()->back()->with('success', $message);
    }

    public function getTicket()
    {
        $journeyPassenger_id = request()->id;

        $journey_passenger= journeyPassenger::whereId($journeyPassenger_id)->first();


        return $journey_passenger;
    }
}
