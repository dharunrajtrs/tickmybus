<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Base\Slug\HasSlug;
use App\Models\Traits\HasActive;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Base\Uuid\UuidModel;

class RestStop extends Model
{
   use SearchableTrait,UuidModel, 
    HasActive;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rest_stops';

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
        'rest_stop_address',
        'rest_lat',
        'rest_lng',
        'service_location_id',
        'landmark'
    ];

    /**
     * The attributes that can be used for sorting with query string filtering.
     *
     * @var array
     */
    public $sortable = [
        'rest_stop_address',
    ];

    /**
    * Get the Flag's full file path.
    *
    * @param string $value
    * @return string
    */
   

    protected $searchable = [
        'columns' => [
            'rest_stops.rest_stop_address' => 20,
            'boardingpoints.landmark'=> 20
        ],
    ];
}
