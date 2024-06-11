<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Base\Slug\HasSlug;
use App\Models\Traits\HasActive;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Base\Uuid\UuidModel;
use Storage;
use App\Models\Admin\Owner;
class Amenity extends Model
{
    use HasFactory,SearchableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'amenities';

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
        'icon',
        'owner_id'
    ];

     protected $appends = [
        'icon'

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
    * Get the Flag's full file path.
    *
    * @param string $value
    * @return string
    */


    protected $searchable = [
        'columns' => [
               'amenities.name' => 20,
        ],
    ];


    public function getIconAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(), $value));
    }

    /**
     * The default file upload path.
     *
     * @return string|null
     */
    public function uploadPath()
    {
        // if (!$this->serviceLocation()->exists()) {
        //     return null;
        // }

        // return folder_merge(config('base.types.upload.images.path')
        return config('base.bus-amenities.upload.images.path');
    }
    public function fleet(){
        return $this->hasmany(Fleet::class,'id','fleet_id');
    }
    public function fleets(){
        return $this->belongsToMany(Fleet::class,'fleet_id','amenity_id');
    }
    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id','id');
    }



}
