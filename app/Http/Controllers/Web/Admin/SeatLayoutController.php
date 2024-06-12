<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Web\BaseController;
use App\Models\Admin\Driver;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Base\Constants\Setting\Settings;
use URL;
use App\Models\Admin\Owner;
use Illuminate\Http\Request;
use App\Models\Admin\Fleet;
use App\Models\Admin\FleetSeatLayout;
use Illuminate\Validation\ValidationException;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Http\Requests\Admin\Journey\SeatLayoutCreateRequest;


class SeatLayoutController extends BaseController
{

    protected $seatLayout;

    /**
     * SeatLayoutController constructor.
     *
     * @param \App\Models\Admin\FleetSeatLayout $seatLayout
     */
    public function __construct(FleetSeatLayout $seatLayout)
    {
        $this->seatLayout = $seatLayout;
    }


    public function seatLayout()
    {

        $page = trans('pages_names.seat_layout');
        $main_menu = 'seat_layout';
        $sub_menu = null;


        return view('admin.seat_layout', compact('page', 'main_menu', 'sub_menu'));
    }

    public function index()
    {
        $page = trans('pages_names.seat_layout');
        $main_menu = 'master';
        $sub_menu = null;

        return view('admin.FleetSeatLayout.index', compact('page', 'main_menu', 'sub_menu'))->render();
    }
    public function create()
    {
        $page = trans('pages_names.add_fleet_seat_layout');

        $main_menu = 'fleet_seat_layout';
        $sub_menu = null;
        $user_checking_id=auth()->user()->id;
        $owner = Owner::where('user_id',$user_checking_id)->first();

        $companies = Owner::where('user_id',$user_checking_id)->where('approve', true)->first();

        return view('admin.FleetSeatLayout.create', compact('page', 'main_menu', 'sub_menu','companies'));
    }


    public function getAllSeatLayout(QueryFilterContract $queryFilter)
    {
        // Get the authenticated user's owner ID
        $user_checking_id = auth()->user()->id;
        $find_owner_id = Owner::where('user_id', $user_checking_id)->first();
        $owner_id = $find_owner_id->id;

        $query = FleetSeatLayout::join('fleets', 'fleet_seat_layouts.fleet_id', '=', 'fleets.id')
            ->where('fleets.owner_id', $owner_id)
            ->where(function($q) {
                $q->where('deck_type', 'upper')
                  ->orWhere('deck_type', 'lower');
            })
            ->groupBy('fleet_id');

        // Apply custom query filters and paginate results
        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.FleetSeatLayout._seatLayout', compact('results'));
    }
    public function fetchBus()
    {
        $bus_company = request()->bus_company;
        $fleetIdsInSeatLayout = FleetSeatLayout::pluck('fleet_id');
        $fleet = Fleet::active()
            ->whereOwnerId($bus_company)
            ->whereNotIn('id', $fleetIdsInSeatLayout)
            ->get();

        return $fleet;
    }

    public function store(SeatLayoutCreateRequest $request)
      {

// dd($request->all());
        //json decode the seat layout
        $seat_layouts = json_decode($request->seatLayoutValue);

        $fleet = Fleet::whereId($request->fleet_id)->first();

        $left_rows = $request->left_row;
        $right_rows = $request->right_row;
        $column = $request->column;
        if($request->back_seat == "vacant"){
            $total_back_seats = 0;
        }else{
            $total_back_seats = 1;
        }
        $total_seats = 0;
        $seat_type = [$request->left_seat_type,$request->right_seat_type,$request->upper_left_seat_type,$request->upper_right_seat_type,];
        $seat_type = array_unique($seat_type);
        $seat_type = implode(',',$seat_type);


        $fleet->update([
            'left_rows' => $column,
            'right_rows' => $column,
            'left_columns' => $left_rows,
            'right_columns' => $right_rows,
            'total_back_seats' => $total_back_seats,
            'seat_type' => $seat_type,
        ]);

        $fleetSeatLayout = FleetSeatLayout::where('fleet_id', $fleet->id)->whereIn('deck_type',['lower','upper'])->first();


        if ($fleetSeatLayout != null)
        {
          throw ValidationException::withMessages(['license_number' => __('Layout exists for Bus')]);
        }else{

            foreach ($seat_layouts as $seat_layout)
            {
                $total_seats ++;
                $seats['position'] = $seat_layout->position;
                $seats['seat_no'] = $seat_layout->seat_no;
                $seats['seat_type'] = $seat_layout->seat_type;
                $seats['order'] = $seat_layout->order;
                if(str_starts_with($seat_layout->seat_no,'U')){
                    $seats['deck_type'] = 'upper';
                }else{
                    $seats['deck_type'] = 'lower';
                }
                $seats['fleet_id'] = $request->fleet_id;
                FleetSeatLayout::create($seats);
            }

        }
        $fleet->update([
            'total_seats' => $total_seats,
        ]);

        $message = trans('succes_messages.seat_layot_created_succesfully');


        return redirect('fleet_seat_layout')->with('success', $message);

  }
    public function getById(Fleet $fleet)
    {

        $seatLayoutView = [
            'left' => [],
            'right' => [],
            'back' => [],
            'upper_left' => [],
            'upper_right' => [],
        ];

        if($fleet){
            $layout_type = [];
            // left lower deck
            $seatLayoutView['left'] = $fleet->fleetSeatLayout()->where("position",'left')
            ->where("deck_type",'lower')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();

            $seat_type = $seatLayoutView['left']->pluck('seat_type')->toArray();
            $seat_type = array_unique($seat_type);
            if (count($seat_type) > 1){  rsort($seat_type); }
            if(count($seat_type)>0){
                array_push($layout_type,$seat_type[0]);
            }else{
                array_push($layout_type,0);
            }

            // back lower deck
            $seatLayoutView['back'] = $fleet->fleetSeatLayout()->where("position",'back')
            ->where("deck_type",'lower')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();

            $seat_type = $seatLayoutView['back']->pluck('seat_type')->toarray();
            $seat_type = array_unique($seat_type);
            if (count($seat_type) > 1){  rsort($seat_type); }
            if(count($seat_type)>0){
                array_push($layout_type,$seat_type[0]);
            }else{
                array_push($layout_type,0);
            }

            // right lower deck
            $seatLayoutView['right'] = $fleet->fleetSeatLayout()->where("position",'right')
            ->where("deck_type",'lower')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();

            $seat_type = $seatLayoutView['right']->pluck('seat_type')->toArray();
            $seat_type = array_unique($seat_type);
            if (count($seat_type) > 1){  rsort($seat_type); }
            if(count($seat_type)>0){
                array_push($layout_type,$seat_type[0]);
            }else{
                array_push($layout_type,0);
            }


            $upper_deck = $fleet->fleetSeatLayout()->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();
            if(count($upper_deck)){

                // left upper deck
                $seatLayoutView['upper_left'] = $fleet->fleetSeatLayout()->where("position",'left')
                ->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();


                $seat_type = $seatLayoutView['upper_left']->pluck('seat_type')->toarray();
                $seat_type = array_unique($seat_type);
                if (count($seat_type) > 1){  rsort($seat_type); }
                if(count($seat_type)>0){
                    array_push($layout_type,$seat_type[0]);
                }else{
                    array_push($layout_type,0);
                }


                // back upper deck
                $seatLayoutView['upper_back'] = $fleet->fleetSeatLayout()->where("position",'back')
                ->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();

                $seat_type = $seatLayoutView['upper_back']->pluck('seat_type')->toarray();
                $seat_type = array_unique($seat_type);
                if (count($seat_type) > 1){  rsort($seat_type); }
                if(count($seat_type)>0){
                    array_push($layout_type,$seat_type[0]);
                }else{
                    array_push($layout_type,0);
                }

                // left upper deck
                $seatLayoutView['upper_right'] = $fleet->fleetSeatLayout()->where("position",'right')
                ->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();

                $seat_type = $seatLayoutView['upper_right']->pluck('seat_type')->toarray();
                $seat_type = array_unique($seat_type);
                if (count($seat_type) > 1){  rsort($seat_type); }
                if(count($seat_type)>0){
                    array_push($layout_type,$seat_type[0]);
                }else{
                    array_push($layout_type,0);
                }
            }else{
                $seatLayoutView['upper_right'] = [];
                $seatLayoutView['upper_left'] = [];
                $seatLayoutView['upper_back'] = [];
            }

        }
        $page = trans('pages_names.seat_layout');
        $main_menu = 'seat_layout';
        $sub_menu = null;

        $bus = $fleet;



     return view('admin.FleetSeatLayout.seat_layout_view', compact('page', 'main_menu','sub_menu','layout_type','bus', 'seatLayoutView'));

    }

    public function update(Request $request)
    {
        $busLayout = $request->bus_layout;
        foreach($busLayout as $key => $value){

            $layout = FleetSeatLayout::findOrFail($value['id']);

            $layout->update(['seat_type'=>$value['seat_type']]);
        }

        return response()->json(['message' => "update successfully"]);
    }

    public function delete($fleet_id)
    {
        $busLayouts = FleetSeatLayout::where('fleet_id', $fleet_id)->get();

        foreach($busLayouts as $busLayout)
        {
           $busLayout->delete();
        }
        $message = trans('succes_messages.seats_deleted_succesfully');

        return redirect('fleet_seat_layout')->with('success', $message);
    }
}
