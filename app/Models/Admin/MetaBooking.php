<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Models\Admin\JourneyPassenger;

class MetaBooking extends Model
{
    use HasActive,SearchableTrait,UuidModel;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meta_booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'journey_id','user_id','seat_id',
       
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } 
     public function journey()
    {
        return $this->belongsTo(Journey::class, 'journey_id', 'id');
    }

    public function journeyPassenger()
    {
        return $this->hasMany(JourneyPassenger::class, 'journey_id', 'journey_id');

    }

}
