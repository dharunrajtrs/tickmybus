<?php

namespace App\Models;

use App\Base\Slug\HasSlug;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Nicolaslopezj\Searchable\SearchableTrait;

class AllCities extends Model
{
    use SearchableTrait,
    HasActive;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'all_cities';

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
        'name',
        'state',
        'active',

    ];

    /**
     * The attributes that can be used for sorting with query string filtering.
     *
     * @var array
     */
    public $sortable = [
        'name','state',
    ];

    /**
    * Get the Flag's full file path.
    *
    * @param string $value
    * @return string
    */

    /**
     * The default file upload path.
     *
     * @return string|null
     */

    /**
     * Get all the countries from the JSON file.
     *
     * @return array
     */
    public static function allJSON()
    {
        $route = dirname(dirname(__FILE__)) . '/Helpers/Countries/cities.json';
        return json_decode(file_get_contents($route), true);
    }



    protected $searchable = [
        'columns' => [
            'all_cities.name' => 20,
            'all_cities.state'=> 20
        ],
    ];
}

