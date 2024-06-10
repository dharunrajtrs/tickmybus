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

class WebAbout extends Model
{
    use HasFactory,SearchableTrait,UuidModel,HasActive,HasActiveCompanyKey;
    // ,SoftDeletes;

    protected $table = 'web_abouts';

    protected $fillable = [
        'hero_bg','about_title','about_us','about_para','about_img','driver_title','driver_heading',
        'driver1','driver1_img','driver2','driver2_img','driver3','driver3_img','driver4','driver4_img',
        'service_title','service_heading','service1_title','service1_para','service1_img','service2_title','service2_para',
        'service2_img','service3_title','service3_para','service3_img','service4_title','service4_para',
        'service4_img','service_img','banner_title','banner_heading','banner_bg',

        
    ];

    protected $appends = [
        'hero_bg','about_img','driver1_img','driver2_img','driver3_img','driver4_img',
        'service1_img','service2_img','service3_img','service4_img','service_img',
        'banner_bg',

    ];

    public function getAboutImageAttribute($value)
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
