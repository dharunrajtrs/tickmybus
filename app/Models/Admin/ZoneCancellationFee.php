<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Journey;

class ZoneCancellationFee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'zone_cancellaion_fees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['service_location_id','hour','percentage'];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];

}
