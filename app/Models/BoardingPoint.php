<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Base\Slug\HasSlug;
use App\Models\Traits\HasActive;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Base\Uuid\UuidModel;
use App\Models\City;
use App\Models\Admin\JourneyUser;
use App\Models\Admin\ServiceLocation;

class BoardingPoint extends Model
{
   use SearchableTrait,
    HasActive,UuidModel;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boardingpoints';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'boarding_address',
        'boarding_lat',
        'boarding_lng',
        'service_location_id',
        'landmark',
        'city_id',
    ];

    /**
     * The attributes that can be used for sorting with query string filtering.
     *
     * @var array
     */
    public $sortable = [
        'route_id',
    ];

    /**
    * Get the Flag's full file path.
    *
    * @param string $value
    * @return string
    */


    protected $searchable = [
        'columns' => [
            'boardingpoints.landmark' => 20,
            'boardingpoints.boarding_address'=> 20
        ],
    ];

    /**
     * The state that the city belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function city()
    {
        return $this->belongsTo(AllCities::class, 'city_id', 'id');
    }
    /**
     * The state that the city belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function journeyUsers()
    {
        return $this->belongsTo(JourneyUser::class, 'id', 'boarding_id');
    }

    /**
     * The state that the city belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function serviceLocations()
    {
        return
        $this->belongsTo(ServiceLocation::class, 'service_location_id', 'id');
    }
    public function journeyBoardingPoint()
    {
        return $this->hasMany(JourneyBoardingPoint::class, 'boardingpoint_id', 'id');
    }

}
