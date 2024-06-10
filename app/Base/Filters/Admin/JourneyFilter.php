<?php

namespace App\Base\Filters\Admin;

use App\Base\Libraries\QueryFilter\FilterContract;
use Illuminate\Http\Request;
use Carbon\Carbon;
/**
 * Test filter to demonstrate the custom filter usage.
 * Delete later.
 */
class JourneyFilter implements FilterContract
{
    
    /**
     * The available filters.
     *
     * @return array
     */
    public function filters()
    {
        return [
           'ac_type','seat_type','departure_time','arrival_time','bus_filter'
        ];
    }

    /**
    * Default column to sort.
    *
    * @return string
    */
    public function defaultSort()
    {
        return '-created_at';
    }
    public function departure_time($builder, $value = 0)
    {
        if ($value) {
            $builder->whereHas('journeyBoardingPoint', function ($query) use ($value) {
                $query->where('boarding_time', '>', date("H:i:s", strtotime($value)));
            });
        }
    }

    public function arrival_time($builder, $value = 0)
    {
        if ($value) {
            $builder->whereHas('journeyStopPoint', function ($query) use ($value) {
                $query->where('stop_time', '>', date("H:i:s", strtotime($value)));
            });
        }
    }

    public function seat_type($builder, $value = 'seater,sleeper,semi_sleeper')
    {
        if ($value) {
            $seatTypes = explode(',', $value);
            $builder->whereHas('fleet', function ($query) use ($seatTypes) {
                foreach ($seatTypes as $seatType) {
                    $query->orWhere('seat_type', 'like', '%' . $seatType . '%');
                }
            });

        }
    }

    public function ac_type($builder, $value='ac,non_ac')
    {
        if (strlen($value) < 3) {
            $builder->whereHas('fleet', function ($query) use ($value) {
                $query->where('bus_type', $value);
            });
        }
    }
    public function bus_filter($builder, $value=0){
        foreach ($value as $filter_var => $filter_value) {
            if($filter_value){
                $this->$filter_var($builder,$filter_value); 
            }else{
                $this->$filter_var($builder); 
            }
        }
    }

}
