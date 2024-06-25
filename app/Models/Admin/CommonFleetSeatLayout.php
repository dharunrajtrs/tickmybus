<?php

namespace App\Models\Admin;

use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Fleet;
use App\Models\Admin\Owner;
use App\Models\Admin\CommanFleet;
class CommonFleetSeatLayout extends Model
{
    use UuidModel,SoftDeletes,HasActive,SoftDeletes;

    //#position const...!
    const LEFT_SIDE="left",RIGHT_SIDE="right",BACK_SIDE="back";


    protected $fillable = ['fleet_id','position','seat_no','seat_type','deck_type','order','no_seat','seat_layout_name','left_rows','right_rows','left_columns','right_columns','total_back_seats','seat_type','fleet_seat_layout_id','owner_id'];

    public function fleet()
    {
        return $this->belongsTo(CommanFleet::class,'fleet_id','id');
    }


    public function journeyPassengers()
    {
        return $this->hasMany(JourneyPassenger::class,'id','seat_id');
    }

    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id','id');
    }
}
