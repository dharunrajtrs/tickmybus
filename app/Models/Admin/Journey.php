<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Models\Admin\Fleet;
use App\Models\City;
use App\Models\Admin\ServiceLocation;
use App\Models\Admin\JourneyUser;
use App\Models\Admin\JourneyBoardingPoint;
use App\Models\Admin\JourneyDropPoint;
use App\Models\Admin\JourneyBill;


class Journey extends Model
{
    use HasActive,SearchableTrait,UuidModel;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journeys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'journey_number','fleet_id','is_completed','completed_at','is_trip_start','started_at','depature_at','arrived_at','seater_price','sleeper_price','semi_sleeper_price',
    'from','to','from_lat','from_lng','to_lat','to_lng','from_city_id','to_city_id',
    'service_location_id','drop_service_location_id','duration','upper_seater_price','upper_sleeper_price','upper_semi_sleeper_price','driver_id','is_cancelled','cancelled_at','cancellation_reason','is_cancelled'

    ];
    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'journeyBill'
    ];
    /**
    * Get the Journey's full file path.
    *
    * @param string $value
    * @return string
    */


    protected $searchable = [
        'columns' => [
            'journeys.journey_number' => 20,
            'journeys.depature_at' => 20,
            'journeys.arrived_at' => 20,
            'service_locations.name'=> 20,
            'cities.city' => 20,

        ],
        'joins' => [
            'cities' => ['journeys.from_city_id','cities.id'],
            'cities' => ['journeys.to_city_id','cities.id'],
            'service_locations' => ['journeys.service_location_id','service_locations.id'],
        ],
    ];


   /**
    * The journey Chat associated with the journey's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function fleet()
    {
        return $this->belongsTo(Fleet::class, 'fleet_id', 'id');
    }
   /**
    * The journey Chat associated with the journey's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }
    public function getConvertedDepatureAtAttribute()
    {

        if ($this->depature_at==null || !auth()->user()->exists()) {
            return null;
        }
        $timezone = auth()->user()->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');
        return Carbon::parse($this->depature_at)->setTimezone($timezone)->format('jS M h:i A');
    }
     public function getConvertedArrivedAtAttribute()
    {

        if ($this->arrived_at==null || !auth()->user()->exists()) {
            return null;
        }
        $timezone = auth()->user()->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');
        return Carbon::parse($this->arrived_at)->setTimezone($timezone)->format('jS M h:i A');
    }
    public function serviceLocation()
    {
        return $this->belongsTo(ServiceLocation::class, 'service_location_id', 'id');
    }
    public function fromCity()
    {
        return $this->belongsTo(City::class, 'from_city_id', 'id');
    }
    public function toCity()
    {
        return $this->belongsTo(City::class, 'to_city_id', 'id');
    }
    public function journeyUser()
    {
        return $this->hasMany(JourneyUser::class, 'journey_id', 'id');
    }
    public function journeyBoardingPoint()
    {
        return $this->hasMany(JourneyBoardingPoint::class, 'journey_id', 'id');
    }
     public function journeyBoardingPointNext()
    {
        return $this->hasMany(JourneyBoardingPoint::class, 'journey_id', 'id');
    }
    public function journeyStopPointNext()
    {
        return $this->hasMany(JourneyStopPoint::class, 'journey_id', 'id');
    }
    public function journeyStopPoint()
    {
        return $this->hasMany(JourneyStopPoint::class, 'journey_id', 'id');
    }
    public function journeyPassenger()
    {
        return $this->hasMany(JourneyPassenger::class, 'journey_id', 'id');
    }

    public function journeyBill()
    {
        return $this->hasOne(JourneyBill::class, 'journey_id', 'id');
    }

    public function getLowPrice()
    {
      $seater =  $this->seater_price;
      $sleeper =  $this->sleeper_price;
      $semi_sleeper = $this->semi_sleeper_price;

      $lowPrice = array_diff(array($seater, $sleeper, $semi_sleeper), array(null));

       return min($lowPrice);


    }

    public function convertedDepatureDate()
    {
        $depature = $this->depature_at;
        $splitdate = explode(" ",$depature);

        $date = $splitdate[0];


        return $date;
    }
    // convertedArraivalDate
    public function convertedArraivalDate()
    {
        $arrived = $this->arrived_at;
        $splitdate = explode(" ",$arrived);

        $date = $splitdate[0];


        return $date;
    }
    public function convertedDepaturedAt()
    {
        $depature = $this->depature_at;

        $splittime = explode(" ",$depature);
        $time = $splittime[1];

        return date("g:i a", strtotime($time));
    }
    public function convertedArrivedAt()
    {
        $arrived = $this->arrived_at;

        $splittime = explode(" ",$arrived);
        $time = $splittime[1];

        return date("g:i a", strtotime($time));
    }
    public function convertedDepaturedDateAt()
    {
        $depature = $this->depature_at;

        $splitdate = explode(" ",$depature);
        $date = $splitdate[0];
        $month = date('M',strtotime($date));

        return $month.' '.Carbon::parse($date)->format('d');
    }
    public function convertedArrivedDateAt()
    {
        $arrived = $this->arrived_at;

        $splitdate = explode(" ",$arrived);
        $date = $splitdate[0];
        $month = date('M',strtotime($date));


        return $month.' '.Carbon::parse($date)->format('d');
    }
}
