<?php

namespace App\Transformers\Journey;

use App\Models\Admin\Fleet;
use App\Transformers\Transformer;
use App\Transformers\Journey\SeatLayoutTransformer;
use  App\Models\Amenity;
use App\Transformers\Journey\AmenityTransformer;

class BusTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = [ 'seatLayout', 'amenties'

    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Fleet $fleet)
    {

        $layout_type = [];
        $layout_rows = [];

        // left lower deck
        $seat_type = $fleet->fleetSeatLayout()->where("position",'left')->where("deck_type",'lower')->orderByRaw('CAST(`order` AS UNSIGNED)')->pluck('seat_type')->toArray();
        $seat_type = array_unique($seat_type);
        if (count($seat_type) > 1){  rsort($seat_type); }
        if(count($seat_type)>0){
            if($seat_type[0] == 'sleeper'){
                array_push($layout_rows,$fleet->left_rows);
            }else{
                array_push($layout_rows,$fleet->left_rows*2);
            }
            array_push($layout_type,$seat_type[0]);
        }else{
            array_push($layout_type,0);
        }

        // back lower deck
        $seat_type =  $fleet->fleetSeatLayout()->where("position",'back')->where("deck_type",'lower')->orderByRaw('CAST(`order` AS UNSIGNED)')->pluck('seat_type')->toarray();
        $seat_type = array_unique($seat_type);
        if (count($seat_type) > 1){  rsort($seat_type); }
        if(count($seat_type)>0){
            array_push($layout_type,$seat_type[0]);
        }else{
            array_push($layout_type,0);
        }

        // right lower deck
        $seat_type = $fleet->fleetSeatLayout()->where("position",'right')->where("deck_type",'lower')->orderByRaw('CAST(`order` AS UNSIGNED)')->pluck('seat_type')->toArray();
        $seat_type = array_unique($seat_type);
        if (count($seat_type) > 1){  rsort($seat_type); }
        if(count($seat_type)>0){
            if($seat_type[0] == 'sleeper'){
                array_push($layout_rows,$fleet->right_rows);
            }else{
                array_push($layout_rows,$fleet->right_rows*2);
            }
            array_push($layout_type,$seat_type[0]);
        }else{
            array_push($layout_type,0);
        }

        $upper_deck = $fleet->fleetSeatLayout()->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->get();
        if(count($upper_deck)){
            // left upper deck
            $seat_type = $fleet->fleetSeatLayout()->where("position",'left')->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->pluck('seat_type')->toarray();
            $seat_type = array_unique($seat_type);
            if (count($seat_type) > 1){  rsort($seat_type); }
            if(count($seat_type)>0){
                array_push($layout_type,$seat_type[0]);
                if($seat_type[0] == 'sleeper'){
                    array_push($layout_rows,$fleet->left_rows);
                }else{
                    array_push($layout_rows,$fleet->left_rows*2);
                }
            }else{
                array_push($layout_type,0);
            }


            // back upper deck

            $seat_type = $fleet->fleetSeatLayout()->where("position",'back')->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->pluck('seat_type')->toarray();
            $seat_type = array_unique($seat_type);
            if (count($seat_type) > 1){  rsort($seat_type); }
            if(count($seat_type)>0){
                array_push($layout_type,$seat_type[0]);
            }else{
                array_push($layout_type,0);
            }

            // left upper deck
            $seat_type = $fleet->fleetSeatLayout()->where("position",'right')->where("deck_type",'upper')->orderByRaw('CAST(`order` AS UNSIGNED)')->pluck('seat_type')->toarray();
            $seat_type = array_unique($seat_type);
            if (count($seat_type) > 1){  rsort($seat_type); }
            if(count($seat_type)>0){
                if($seat_type[0] == 'sleeper'){
                    array_push($layout_rows,$fleet->right_rows);
                }else{
                    array_push($layout_rows,$fleet->left_rright_rowsows*2);
                }
                array_push($layout_type,$seat_type[0]);
            }else{
                array_push($layout_type,0);
            }
        }
            $params = [
            'id' => $fleet->id,
            'owner_id' => $fleet->owner_id,
            'brand' => $fleet->brand,
            'image' => $fleet->owner->user->profile_picture,
            'model' => $fleet->model,
            'license_number' => $fleet->license_number,
            'permission_number' =>  $fleet->permission_number,
            'active' =>  $fleet->active,
            'left_columns' =>  $fleet->left_columns,
            'right_columns' =>  $fleet->right_columns,
            'left_rows' =>  $layout_rows[0],
            'right_rows' =>  $layout_rows[1],
            'upper_left_rows' =>  $layout_rows[2],
            'upper_right_rows' =>  $layout_rows[3],
            'total_back_seats' =>  $fleet->total_back_seats,
            'seat_type' =>  $fleet->seat_type,
            'bus_type' =>  $fleet->bus_type,
            'layout_type'=> $layout_type,
        ];

        


        return $params;


    }
    /**
     * Include the SeatLayour of the bus.
     *
     * @param Fleet $fleet
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeSeatLayout(Fleet $fleet)
    {
        $fleetSeatLayout = $fleet->fleetSeatLayout()->orderByRaw("seat_no REGEXP '^[A-Z]{2}' ASC,
           IF(seat_no REGEXP '^[A-Z]{2}', LEFT(seat_no, 2), LEFT(seat_no, 1)),
           CAST(IF(seat_no REGEXP '^[A-Z]{2}', RIGHT(seat_no, LENGTH(seat_no) - 2), RIGHT(seat_no, LENGTH(seat_no) - 1)) AS SIGNED)")->get();

        return $fleetSeatLayout
        ? $this->collection($fleetSeatLayout, new SeatLayoutTransformer)
        : $this->null();
    }
    /**
     * Include the Amenity of the bus.
     *
     * @param Fleet $fleet
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeAmenties(Fleet $fleet)
    {

        
        $amenity = $fleet->amenities;

            // dd($amenity);
        return $amenity
        ? $this->collection($amenity, new AmenityTransformer)
        : $this->null();

    }
}
