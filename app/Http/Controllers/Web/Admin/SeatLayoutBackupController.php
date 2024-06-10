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
        $main_menu = 'seat_layout';
        $sub_menu = null;

        return view('admin.FleetSeatLayout.index', compact('page', 'main_menu', 'sub_menu'))->render();
    }
    public function create()
    {
        $page = trans('pages_names.add_fleet_seat_layout');

        $main_menu = 'fleet_seat_layout';
        $sub_menu = null;


        $companies = Owner::where('active', true)->where('approve', true)->get();
    
        return view('admin.FleetSeatLayout.create', compact('page', 'main_menu', 'sub_menu','companies'));
    }


    public function getAllSeatLayout(QueryFilterContract $queryFilter)
    {
        $query = FleetSeatLayout::groupBy('fleet_id')->where('deck_type','upper')->orWhere('deck_type', 'lower')->groupBy('deck_type');

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.FleetSeatLayout._seatLayout', compact('results'));
    }
    public function fetchBus()
    {
        $busCompany = request()->bus_company;

        $fleet = Fleet::active()->whereOwnerId($busCompany)->get();

        return $fleet;
    }

    public function store(SeatLayoutCreateRequest $request)
      {

// dd($request->all());
        //json decode the seat layout
        $seat_layouts = json_decode($request->seatLayoutValue);

        $fleet = Fleet::whereId($request->fleet_id)->first();

        $left_rows = $request->left_row;

        $left_columns = $request->left_column;

        $total_left_seats= $left_rows * $left_columns ;

        $right_rows = $request->right_row;

        $right_columns = $request->right_column;
      
        $total_right_seats= $right_rows * $right_columns;

        $total_back_seats = $request->back;

        $fleet->update([
            'left_columns' => $left_columns,
            'right_columns' => $right_columns,
            'left_rows' => $left_rows,
            'right_rows' => $right_rows,
            'total_back_seats' => $total_back_seats,
        ]);

        $fleetSeatLayout = FleetSeatLayout::where('fleet_id', $fleet->id)->where('deck_type', $request->deck_type)->first();


        if ($fleetSeatLayout != null) 
        {
          throw ValidationException::withMessages(['deck_type' => __('Deck Type Already Assigned for Bus')]);     
        }else{

            foreach ($seat_layouts as $seat_layout) 
            {
                $seats['position'] = $seat_layout->position;
                $seats['seat_no'] = $seat_layout->seat_no;
                $seats['seat_type'] = $seat_layout->seat_type;
                $seats['order'] = $seat_layout->order;
                $seats['deck_type'] = $request->deck_type;
                $seats['fleet_id'] = $request->fleet_id;
                FleetSeatLayout::create($seats);
            }

        }    
   
        $message = trans('succes_messages.seat_layot_created_succesfully');


        return redirect('fleet_seat_layout')->with('success', $message);

  }
    public function getById(Fleet $fleet, $deck_type=FleetSeatLayout::DECK_UPPER)
    {
        
        $seatLayoutView = [
            FleetSeatLayout::LEFT_SIDE => [],
            FleetSeatLayout::RIGHT_SIDE => [],
            FleetSeatLayout::BACK_SIDE=>[]
        ];
            
        if($fleet){
            $seatLayoutView[FleetSeatLayout::LEFT_SIDE] = $fleet->fleetSeatLayout()->where("position",FleetSeatLayout::LEFT_SIDE)
            ->where("deck_type",$deck_type)->orderByRaw('CAST(`order` AS UNSIGNED)')->get();
            $seatLayoutView[FleetSeatLayout::RIGHT_SIDE] = $fleet->fleetSeatLayout()->where("position",FleetSeatLayout::RIGHT_SIDE)
            ->where("deck_type",$deck_type)->orderByRaw('CAST(`order` AS UNSIGNED)')->get();
            $seatLayoutView[FleetSeatLayout::BACK_SIDE] = $fleet->fleetSeatLayout()->where("position",FleetSeatLayout::BACK_SIDE)
            ->where("deck_type",$deck_type)->orderByRaw('CAST(`order` AS UNSIGNED)')->get();

        }
        // dd("hai", $seatLayoutView);
            $page = trans('pages_names.seat_layout');
            $main_menu = 'seat_layout';
            $sub_menu = null;    

            $bus = $fleet;



     return view('admin.FleetSeatLayout.seat_layout_view', compact('page', 'main_menu', 'sub_menu','bus', 'seatLayoutView'));

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

    public function delete($fleet_id, $deck_type)
    {
        $busLayouts = FleetSeatLayout::where('fleet_id', $fleet_id)->where('deck_type', $deck_type)->get();
        foreach($busLayouts as $busLayout)
        {
           $busLayout->delete();
        }
        $message = trans('succes_messages.seats_deleted_succesfully');

        return redirect('fleet_seat_layout')->with('success', $message);
    }
}
