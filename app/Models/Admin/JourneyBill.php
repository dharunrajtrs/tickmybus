<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Journey;

class JourneyBill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journey_bills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['journey_id','user_id','cancellation_fee','service_tax','service_tax_percentage','promo_discount','admin_commision_from_user','admin_commision_from_company','company_ticket_amount','total_admin_commision','requested_currency_code','requested_currency_symbol','total_amount','is_cancelled'
];

    /**
     * The relationships that can be loaded with query string filtering includes.
     *
     * @var array
     */
    public $includes = [

    ];
    public function journeyDetail()
    {
        return $this->belongsTo(Journey::class, 'journey_id', 'id');
    }




}
