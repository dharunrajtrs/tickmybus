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

class WebContact extends Model
{
    use HasFactory,SearchableTrait,UuidModel,HasActive,HasActiveCompanyKey;
    // ,SoftDeletes;

    protected $table = 'web_contacts';

    protected $fillable = [
        'phone','address','email','form_title','form_name','form_email','form_subject',
        'form_btn','form_img','hero_bg','map',
       
        
        
    ];

    protected $appends = [
        'hero_bg','form_img',
        
    ];

    public function getContactImgAttribute($value)
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
