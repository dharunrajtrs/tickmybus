<?php

namespace App\Http\Controllers\Web\Admin;

use App\Base\Constants\Auth\Role as RoleSlug;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\BaseController;
use App\Http\Requests\Admin\Fleet\FleetStoreRequest;
use App\Models\Admin\AreaType;
use App\Models\Admin\Driver;
use App\Models\Admin\Fleet;
use App\Models\FleetMultiImage;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Admin\FleetNeededDocument;
use App\Jobs\Notifications\AndroidPushNotification;
use App\Jobs\Notifications\SendPushNotification;
use Image;
use Carbon\Carbon;
use App\Models\Admin\Owner;
use App\Models\Amenity;
use Illuminate\Validation\ValidationException;
use Prewk\XmlStringStreamer;
use App\Http\Requests\Admin\Fleet\FleetUpdateRequest;
use App\Models\Admin\CommanFleet;
use Illuminate\Support\Facades\Validator;
use App\Models\FleetAmenity;


class FleetController extends BaseController
{

    /**
     * The Fleet model instance.
     *
     * @var \App\Models\Admin\Fleet
     */
    protected $fleet;

    /**
     * FleetController constructor.
     *
     * @param \App\Models\Admin\Fleet $fleet
     */
    public function __construct(Fleet $fleet, ImageUploaderContract $imageUploader, FleetMultiImage $fleetImage)
    {
        $this->fleet = $fleet;
        $this->imageUploader = $imageUploader;
        $this->fleetImage = $fleetImage;

    }

    public function index()
    {
        $page = trans('pages_names.fleets');
        $main_menu = 'manage_fleet';
        $sub_menu = '';

        return view('admin.fleets.index', compact('page', 'main_menu', 'sub_menu'))->render();
    }

    public function fetch(QueryFilterContract $queryFilter)
    {
        // $query = Fleet::query();

        if (access()->hasRole(RoleSlug::SUPER_ADMIN)) {
            $query = Fleet::query();
            } else {
                $this->validateAdmin();
                $query = Fleet::where('owner_id', auth()->user()->owner->id)->orderBy('created_at', 'desc');
                // $query = Driver::orderBy('created_at', 'desc');
            }

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();

        return view('admin.fleets._fleets', compact('results'))->render();
    }

    public function create()
    {
      $user_checking_id=auth()->user()->id;

        $page = trans('pages_names.add_fleet');

        $main_menu = 'manage_fleet';
        $sub_menu = '';

        $owner = Owner::where('user_id',$user_checking_id)->first();

        $amenties = Amenity::all();
        $seat_layout_options = CommanFleet::where('owner_id',$owner->id)->get();

        // dd($amenties);

        return view('admin.fleets.create', compact('page', 'main_menu', 'sub_menu','owner','amenties','seat_layout_options'));
    }

    public function store(FleetStoreRequest $request)
    {
        $created_params = $request->only(['brand','model','license_number','owner_id','total_seats','bus_type']);
        $created_params['comman_fleet_id']= $request->seat_layout_options;
        $seat = implode(',', $request->seat_type);

        $fleet = Fleet::create($created_params);

       $images = $request->file('multi_img');

      if($images){
        foreach ($images as $img) {

        $img_params['image_name'] = $this->imageUploader->file($img)
                ->saveBusImages();
        $img_params['fleet_id'] = $fleet->id;

        $this->fleetImage->create($img_params);

          }
        }else{
            throw ValidationException::withMessages(['multi_img' => __('add bus images')]);
        }

        foreach ($request->bus_amenties as $amenties)
        {
            $amenity_params['fleet_id'] = $fleet->id;
            $amenity_params['amenity_id'] = $amenties;

            $fleet->fleetAmenity()->create($amenity_params);
         }

       $message = trans('succes_messages.fleet_added_succesfully');

        return redirect('fleets')->with('success', $message);
    }

    public function getById(Fleet $fleet)
    {
        $user_checking_id=auth()->user()->id;
        $owner = Owner::where('user_id',$user_checking_id)->first();
        $seat_layout_options = CommanFleet::where('owner_id',$owner->id)->get();
        $page = trans('pages_names.edit_fleet');
        $main_menu = 'manage_fleet';
        $sub_menu = '';

        $item = $fleet;
        $owners = Owner::whereActive(true)->get();
        $multiImgs = FleetMultiImage::where('fleet_id',$fleet->id)->get();

        $amenties = Amenity::all();


         return view('admin.fleets.update', compact('page', 'item', 'main_menu', 'sub_menu','owners','multiImgs','amenties','seat_layout_options'));
    }


    public function update(Request $request, Fleet $fleet)
    {
       $fleet->fleetAmenity()->delete();

        foreach ($request->bus_amenties as $key=>$amenties)
        {
            $amenity_params['fleet_id'] = $fleet->id;
            $amenity_params['amenity_id'] =json_decode($amenties)->id;

            $fleet->fleetAmenity()->create($amenity_params);

         }

        $updated_params = $request->only(['brand','model','license_number','owner_id','total_seats','bus_type']);
        $updated_params['comman_fleet_id']= $request->seat_layout_options;
        $seat = implode(',', $request->seat_type);


        $updated_params['seat_type'] = $seat;


        $fleet->update($updated_params);

        $imgs = $request->multi_img;
       if ($request->file('multi_img')) {

         foreach ($imgs as $id => $img) {

        $img_params['image_name'] = $this->imageUploader->file($img)
                ->saveBusImages();
        $img_params['fleet_id'] = $fleet->id;


        $fleet->fleetImage()->create($img_params);

     }



     $message = trans('succes_messages.fleet_updated_succesfully');

     return redirect('fleets')->with('success', $message);
    }else{
        $message = trans('succes_messages.fleet_updated_succesfully');

        return redirect('fleets')->with('success', $message);

        }
    }

    public function multiImgDelete(FleetMultiImage $fleetImg)
    {
        $fleetImg->delete();

        $message = trans('succes_messages.fleet_img_deleted_succesfully');

        return redirect()->back()->with('success', $message);

    }


    public function toggleStatus(Fleet $fleet)
    {
        $status = $fleet->active == 1 ? 0 : 1;

        $fleet->update([
            'active' => $status
        ]);

        $message = trans('succes_messages.fleet_status_changed_succesfully');

        return redirect('fleets')->with('success', $message);
    }

    public function toggleApprove(Fleet $fleet)
    {
        $status = $fleet->approve == 1 ? 0 : 1;


        if ($status) {
            $err = false;
            $neededDoc = FleetNeededDocument::count();

            $uploadedDoc = count($fleet->fleetDocument);

            if ($neededDoc != $uploadedDoc) {
                return redirect('fleets/document/view/'.$fleet->id);
            }

            foreach ($fleet->fleetDocument as $fleetDoc) {
                if ($fleetDoc->document_status != 1) {
                    $err = true;
                }
            }

            if ($err) {
                $message = trans('succes_messages.driver_document_not_approved');
                return redirect('fleets/document/view/'.$fleet->id);
            }

        }

        $fleet->update([
            'approve' => $status
        ]);

        $fleet->fresh();

        $user = $fleet->user;

        $title = trans('push_notifications.fleet_declined_title',[]);
        $body = trans('push_notifications.fleet_declined_body',[]);

        if($status){
            $title = trans('push_notifications.fleet_approved_title',[]);
            $body = trans('push_notifications.fleet_approved_body',[]);

        }

        dispatch(new SendPushNotification($user,$title,$body));

        $message = trans('succes_messages.fleet_approval_status_changed_succesfully');
        return redirect('fleets')->with('success', $message);
    }

    public function updateFleetDeclineReason(Request $request){
        Fleet::whereId($request->id)->update([
            'reason' => $request->reason
        ]);

        return 'success';
    }

    public function delete(Fleet $fleet)
    {
         if($fleet->driverDetail){

            $fleet->driverDetail()->update(['fleet_id'=>null,'vehicle_type'=>null]);

        }

        $fleet->delete();

        $message = trans('succes_messages.fleet_deleted_succesfully');

        return redirect('fleets')->with('success', $message);
    }

    public function generateQRCode($fleet){
        do {
            $code = str_random(30);
        } while ($this->fleet->whereFleetId($code)->exists());

        $qr_code_image_name = 'qrcode-'.$fleet->id.'.svg';

        $qr_code = QrCode::size(500)
            // ->format('svg')
            ->generate($code, storage_path('app/public/uploads/qr-codes/'.$qr_code_image_name));

        return ['code'=>$code,'qrcode'=>$qr_code_image_name];
    }

    public function assignDriverView(Fleet $fleet)
    {
        $page = trans('pages_names.fleets');
        $main_menu = 'manage_fleet';
        $sub_menu = '';

        $drivers = Driver::whereOwnerId(auth()->user()->owner->id)->whereNull('fleet_id')->get();

        return view('admin.fleets.assign_driver', compact('page', 'main_menu', 'sub_menu','drivers','fleet'));
    }

    public function assignDriver(Request $request,Fleet $fleet)
    {
        $driver = Driver::whereId($request->driver)->first();
        $isVehicleAlreadyAssigned = Driver::whereFleetId($fleet->id)->whereApprove(true)->whereActive(true)->whereAvailable(false)->exists();

        if ($isVehicleAlreadyAssigned) {
            return back()->withErrors('Fleet already assigned with another driver')->withInput($request->all());
        }

        if ($driver->fleet_id != null) {
            return back()->withErrors('Selected driver is already assigned with another vehicle')->withInput($request->all());
        }

        $driver->update([
            'fleet_id' => $fleet->id,
            'vehicle_type' => $fleet->vehicle_type
        ]);

        $message = trans('succes_messages.driver_assigned_succesfully');

        return redirect('fleets')->with('success', $message);
    }
    public function getByIdSeat(CommanFleet $fleet)
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



     return view('admin.fleets.seat_layout_view', compact('page', 'main_menu','sub_menu','layout_type','bus', 'seatLayoutView'));

    }


}

