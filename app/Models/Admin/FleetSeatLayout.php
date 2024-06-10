<?php

namespace App\Models\Admin;

use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Fleet;


class FleetSeatLayout extends Model
{
    use UuidModel,SoftDeletes,HasActive,SoftDeletes;

    //#position const...!
    const LEFT_SIDE="left",RIGHT_SIDE="right",BACK_SIDE="back";


    protected $fillable = ['fleet_id','position','seat_no','seat_type','deck_type','order','no_seat'];
 
    public function fleet()
    {
        return $this->belongsTo(Fleet::class,'fleet_id','id');
    }


    public function journeyPassengers()
    {
        return $this->hasMany(JourneyPassenger::class,'id','seat_id');
    }

}
