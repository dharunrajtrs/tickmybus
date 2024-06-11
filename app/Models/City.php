<?php

namespace App\Models;

use App\Base\Slug\HasSlug;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ServiceLocation;
use App\Models\Admin\Owner;

class City extends Model
{
    use HasActive, HasSlug, UuidModel;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city','landmark','city_lat','city_lng','slug', 'name', 'alias', 'active','short_code','owner_id'

    ];

    /**
     * The attributes that can be used for sorting with query string filtering.
     *
     * @var array
     */
    public $sortable = [
        'name',
    ];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [
        'state',
    ];

    /**
     * The state that the city belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id')->withDefault();
    }

    /**
     * Get the attribute name to slugify.
     *
     * @return string
     */
    public function getSlugSourceColumn()
    {
        return 'name';
    }
    /**
     * The state that the city belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */


    /**
    * The user wallet history associated with the user's id.
    *
    * @return \Illuminate\Database\Eloquent\Relations\hasOne
    */
    public function boardingPoints()
    {
        return $this->hasMany(BoardingPoint::class, 'city_id', 'id');
    }
    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id','id');
    }


}
