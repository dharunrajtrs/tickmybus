<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Base\Uuid\UuidModel;


class FleetAmenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'fleet_id','amenity_id',
    ];

    protected $guarded = [];
  
    public function fleet(){
        return $this->belongsTo(Fleet::class,'fleet_id','id');
    }
    public function amenity(){
        return $this->hasmany(Amenity::class,'id','amenity_id');
    }
}
