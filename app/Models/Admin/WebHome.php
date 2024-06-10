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

class WebHome extends Model
{
    use HasFactory,SearchableTrait,UuidModel,HasActive,HasActiveCompanyKey;
    // ,SoftDeletes;

    protected $table = 'web_homes';

    protected $fillable = [
        'hero_title_1','hero_short_title_1','hero_img1','hero_title_2','hero_short_title_2','hero_img2',
        'hero_title_3','hero_short_title_3','hero_img3','hero_booknow','about_title','about_us','about_para','about_img',
        'banner1_title','banner1_heading','banner1_bg','bus_types_title','bus_types_heading','sleeper1_heading','sleeper1_title',
        'sleeper1_para','sleeper1_img','sleeper2_heading','sleeper2_title','sleeper2_para','sleeper2_img',
        'sleeper3_heading','sleeper3_title','sleeper3_para','sleeper3_img','semi_sleeper1_heading','semi_sleeper1_title',
        'semi_sleeper1_para','semi_sleeper1_img','semi_sleeper2_heading','semi_sleeper2_title','semi_sleeper2_para','semi_sleeper2_img',
        'semi_sleeper3_heading','semi_sleeper3_title','semi_sleeper3_para','semi_sleeper3_img','seater1_heading',
        'seater1_title','seater1_para','seater1_img','seater2_heading','seater2_title','seater2_para','seater2_img',
        'seater3_heading','seater3_title','seater3_para','seater3_img','banner2_title','banner2_btn','banner2_bg','dwnld_heading','dwnld_title','dwnld_para',
        'dwnld_title1','dwnld_para1','dwnld_playstore','dwnld_appstore',

        
    ];

    protected $appends = [
        'hero_img1','hero_img3','hero_img3','about_img','banner1_bg','sleeper1_img','sleeper2_img','sleeper3_img',
        'semi_sleeper1_img','semi_sleeper2_img','semi_sleeper3_img','seater1_img','seater2_img','seater3_img',
        'banner2_bg',

    ];

    public function getHomeAttribute($value)
    {
        // if (empty($value)) {
        //     return null;
        // }

        return Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(), $value));
        
    }

    public function uploadPath()
    {
        
        // return folder_merge(config('base.types.upload.images.path')
        return config('base.website.upload.images.path');
    }


}
