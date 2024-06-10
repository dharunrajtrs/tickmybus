<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Models\Admin\JourneyUser;


class JourneyPassenger extends Model
{
    use HasActive,SearchableTrait,UuidModel;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journey_passengers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['journey_id','journey_user_id','seat_id','name','gender','age','ticket_number','boarding_status'];

     public function journey()
    {
        return $this->belongsTo(Journey::class, 'journey_id', 'id');
    }
     public function journeyUser()
    {
        return $this->belongsTo(JourneyUser::class, 'journey_id', 'journey_id');
    }
     public function fleetSeat()
    {
        return $this->belongsTo(FleetSeatLayout::class, 'seat_id', 'id');
    }
}
