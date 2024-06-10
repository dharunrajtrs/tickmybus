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

class WebHeader extends Model
{
    use HasFactory,SearchableTrait,UuidModel,HasActive,HasActiveCompanyKey;
    // ,SoftDeletes;

    protected $table = 'web_headers';

    protected $fillable = [
        'theme_color','logo','fevicon','btn_color','heading_color','footer_bg_color','footer_about_title',
        'footer_about_para','user_play_link','user_app_link','driver_play_link','driver_app_link','footer_quicklink_privacy','footer_quicklink_terms',
        'footer_quicklink_contact','footer_info_para','footer_info_mobile','footer_info_email','footer_copy_rights',
       
        
        
    ];

    protected $appends = [
        'logo','fevicon',
        
    ];

    public function getHeaderImgAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return Storage::disk(env('FILESYSTEM_DRIVER'))->url(file_path($this->uploadPath(), $value));
    }

    public function uploadPath()
    {
        
        return config('base.website.upload.images.path');
    }


}
