<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Models\Traits\HasActiveCompanyKey;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use App\App\Models\BoardingPoint;

class ServiceLocation extends Model
{
    use HasActive, UuidModel,SoftDeletes,SearchableTrait,HasActiveCompanyKey;
    use SpatialTrait;

    protected $table = 'service_locations';

    protected $fillable = ['name','currency_name','currency_code','currency_symbol','country','timezone','active','company_key','unit','coordinates','lat','lng'];

    protected $spatialFields = [
        'coordinates'
    ];

    protected $searchable = [
        'columns' => [
            'service_locations.name' => 20,
            'service_locations.currency_name'=> 10
        ],
    ];
    /**
    * Get formated and converted timezone of user's created at.
    *
    * @param string $value
    * @return string
    */
    public function getConvertedCreatedAtAttribute()
    {
        if ($this->created_at==null||!auth()->user()->exists()) {
            return null;
        }
        $timezone = auth()->user()->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');
        return Carbon::parse($this->created_at)->setTimezone($timezone)->format('jS M h:i A');
    }
    /**
    * Get formated and converted timezone of user's created at.
    *
    * @param string $value
    * @return string
    */
    public function getConvertedUpdatedAtAttribute()
    {
        if ($this->updated_at==null||!auth()->user()->exists()) {
            return null;
        }
        $timezone = auth()->user()->timezone?:env('SYSTEM_DEFAULT_TIMEZONE');
        return Carbon::parse($this->updated_at)->setTimezone($timezone)->format('jS M h:i A');
    }
    public function zoneCancellationFee()
    {
        return $this->hasMany(ZoneCancellationFee::class, 'service_location_id', 'id');
    }
    
}
