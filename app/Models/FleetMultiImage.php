<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Base\Uuid\UuidModel;


class FleetMultiImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'fleet_id','image_name','UuidModel'
    ];

    protected $guarded = [];

    /**
    * The accessors to append to the model's array form.
    *
    * @var array
    */
    protected $appends = [
        'image_name'
    ];
          /**
    * Get the Logo image full file path.
    *
    * @param string $value
    * @return string
    */
    public function getImageNameAttribute($value)
    {
        if (!$value) 
        {
            $default_image_path = config('base.bus.upload.images.path');
            return env('APP_URL').$default_image_path;
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
        return config('base.bus.upload.images.path');
    }  
    public function fleet(){
        return $this->belongsTo(Fleet::class,'fleet_id','id');
    }
}
