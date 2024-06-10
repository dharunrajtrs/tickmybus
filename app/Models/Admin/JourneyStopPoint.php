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



class JourneyStopPoint extends Model
{
    use HasActive,SearchableTrait,UuidModel;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journey_stop_points';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'journey_id','stop_id','stop_time'
       
    ];


         /**
    * The journey Chat associated with the journey's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function journey()
    {
        return $this->belongsTo(Journey::class, 'journey_id', 'id');
    }
         /**
    * The journey Chat associated with the journey's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\belongsTo
    */
    public function stopPoint()
    {
        return $this->belongsTo(BoardingPoint::class, 'stop_id', 'id');
    }
    public function getStopAttribute()
    {
        return now()->parse($this->stop_time)->format('h:i a');
    }

}
