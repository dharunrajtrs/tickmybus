<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Models\Admin\JourneyPassenger;
use App\Models\BoardingPoint;

class JourneyUser extends Model
{
    use HasActive,SearchableTrait,UuidModel;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journey_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'journey_id','date','user_id','is_cancelled','cancelled_at','cancelled_by','user_rated','rating','no_of_seats','boarding_id','drop_id','ticket_number','is_paid','ticket_fare','is_completed','is_refunded','cancellation_fee','is_promo','promo_code_id'
       
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } 
     public function journey()
    {
        return $this->belongsTo(Journey::class, 'journey_id', 'id');
    }
     public function journeys()
    {
        return $this->hasmany(Journey::class, 'id', 'journey_id');
    }
    public function journeyPassenger()
    {
        return $this->hasMany(JourneyPassenger::class, 'journey_id', 'journey_id');

    }
    public function journeyPassengerDetail()
    {
        return $this->hasMany(JourneyPassenger::class, 'journey_id', 'journey_id');

    }
    public function passengers(){
        return $this->belongsToMany(JourneyPassenger::class,'journey_passengers','journey_id','journey_user_id');
    }

     public function boardingPoint()
    {
        return $this->belongsTo(BoardingPoint::class, 'boarding_id', 'id');
    }
     public function dropPoint()
    {
        return $this->belongsTo(BoardingPoint::class, 'drop_id', 'id');
    }
}
