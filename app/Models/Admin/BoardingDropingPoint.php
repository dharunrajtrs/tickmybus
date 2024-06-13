<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Models\City;
use App\Models\Admin\ServiceLocation;
use App\Models\Admin\JourneyUser;
use App\Models\Admin\Journey;
use App\Models\BoardingPoint;



class BoardingDropingPoint extends Model
{
    use HasActive,SearchableTrait,UuidModel;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boarding_droping_point';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['boarding_id','boarding_time','boarding_droping_point_address'
    ];


         /**
    * The journey Chat associated with the journey's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    // public function journey()
    // {
    //     return $this->belongsTo(Journey::class, 'journey_id', 'id');
    // }

         /**
    * The journey Chat associated with the journey's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function boardingPoint()
    {
        return $this->belongsTo(BoardingPoint::class, 'boarding_id', 'id');
    }
         /**
    * The journey Chat associated with the journey's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function stopPoint()
    {
        return $this->belongsTo(BoardingPoint::class, 'boarding_id', 'id');
    }
    public function getBoardingAttribute()
    {
        return now()->parse($this->boarding_time)->format('h:i a');
    }

}
