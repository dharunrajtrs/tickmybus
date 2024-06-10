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

class WebTerm extends Model
{
    use HasFactory,SearchableTrait,UuidModel,HasActive,HasActiveCompanyKey;
    // ,SoftDeletes;

    protected $table = 'web_terms';

    protected $fillable = [
        'hero_bg','terms',

        
    ];

    protected $appends = [
        'hero_bg',

    ];

    public function getTermImageAttribute($value)
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
