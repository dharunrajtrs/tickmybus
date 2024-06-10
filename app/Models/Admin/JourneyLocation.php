<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class JourneyLocation extends Model
{
    use HasActive,SoftDeletes,SearchableTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journey_locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'location_type', 'journey_id','boarding_id','rest_stop_id'
       
    ];
 
}
