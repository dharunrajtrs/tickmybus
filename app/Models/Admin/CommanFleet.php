<?php

namespace App\Models\Admin;

use App\Base\Uuid\UuidModel;
use App\Models\Traits\HasActive;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FleetMultiImage;
use App\Models\Admin\FleetSeatLayout;
use App\Models\FleetAmenity;
use App\Models\Amenity;


class CommanFleet extends Model
{
    use UuidModel,SoftDeletes,HasActive;

    protected $fillable = [
        'owner_id','brand','model','license_number','permission_number','active','fleet_id','approve','car_color','driver_id','add_photos','left_columns','right_columns','left_rows','right_rows','total_back_seats','seat_type','total_seats','bus_type','fleet_seat_layouts_id','seat_layout_name'
        ];


    public function fleetSeatLayout()
    {
        return $this->hasMany(CommonFleetSeatLayout::class,'fleet_id','id');
    }
    public function fleetDocument(){
        return $this->hasMany(FleetDocument::class,'fleet_id','id');
    }

    public function fleetImage(){
        return $this->hasMany(FleetMultiImage::class,'fleet_id','id');
    }
    public function fleetAmenity(){
        return $this->hasMany(FleetAmenity::class,'fleet_id','id');
    }

    public function getQrCodeImageAttribute(){
        return asset('storage/uploads/qr-codes/'.$this->qr_image);
    }

    public function user(){
        return $this->belongsTo(User::class,'owner_id','id');
    }
    public function getFleetNameAttribute(){
        return  $this->carBrand->name .' - '. $this->carModel->name .' ('.$this->vehicleType->name.')';
    }

    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id','id');
    }
    public function amenities(){
        return $this->belongsToMany(Amenity::class,'fleet_amenities','fleet_id','amenity_id');
    }


}
