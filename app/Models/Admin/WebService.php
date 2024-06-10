<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasActiveCompanyKey;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class WebService extends Model
{
    use HasFactory,SearchableTrait,UuidModel,HasActive,HasActiveCompanyKey;
    // ,SoftDeletes;

    protected $table = 'web_services';

    protected $fillable = [
        'amenity_title','amenity_heading','amenity_para','amenity1_title','amenity1_para','amenity1_img','amenity2_title',
        'amenity2_para','amenity2_img','amenity3_title','amenity3_para','amenity3_img','amenity4_title','amenity4_para','amenity4_img',
        'service_title','service_heading','service1_title','service1_para','service1_img','service2_title','service2_para',
        'service2_img','service3_title','service3_para','service3_img','service4_title','service4_para',
        'service4_img','service_img','amenity5_title','amenity5_para','amenity5_img','amenity6_para','amenity6_img',
        'amenity7_title','amenity7_para','amenity7_img','amenity8_title','amenity8_para','amenity8_img',
        'amenity9_title','amenity9_para','amenity9_img','dwnld_heading','dwnld_title','dwnld_para',
        'dwnld_title1','dwnld_para1','dwnld_playstore','dwnld_appstore','hero_bg',
        
    ];

    protected $appends = [
        'hero_bg','service1_img','service2_img','service3_img','service4_img','amenity1_img','amenity2_img','amenity3_img',
        'amenity4_img','amenity5_img','amenity6_img','amenity7_img','amenity8_img','amenity9_img','service_img',
        

    ];

    public function getServiceImgAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(), $value));
    }

    public function uploadPath()
    {
        
        // return folder_merge(config('base.types.upload.images.path')
        return config('base.website.upload.images.path');
    }


}
