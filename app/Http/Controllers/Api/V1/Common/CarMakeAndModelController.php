<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Master\CarMake;
use App\Models\Master\CarModel;
use App\Http\Controllers\Api\V1\BaseController;
use Carbon\Carbon;
use Sk\Geohash\Geohash;
use Illuminate\Http\Request;

/**
 * @group Vehicle Management
 *
 * APIs for vehilce management apis. i.e types,car makes,models apis
 */
class CarMakeAndModelController extends BaseController
{


    /**
    * Get All Car makes
    *
    */
    public function getCarMakes()
    { 
        if(request()->has('vehicle_type')){

        return $this->respondSuccess($this->car_make->active()->orderBy('name')->where('vehicle_make_for',request()->vehicle_type)->get());

        }else{
            return $this->respondSuccess($this->car_make->active()->orderBy('name')->get());
        }
    }

   

    /**
    * Get Car models by make id
    * @urlParam make_id  required integer, make_id provided by user
    */
    public function getCarModels($make_id)
    {
        return $this->respondSuccess($this->car_model->where('make_id', $make_id)->active()->orderBy('name')->get());
    }


    /**
     * Test Api
     * 
     * */
    public function testApi(Request $request){

        $exploded_left = explode('X', $request->left);

        $left_columns = $exploded_left[0];

        $left_rows = $exploded_left[1];

        $total_left_seats= $left_columns * $left_rows;

        $exploded_right = explode('X', $request->right);

        $right_columns = $exploded_right[0];

        $right_rows = $exploded_right[1];

        $total_right_seats= $right_columns * $right_rows;

        $total_back_seats = $request->back;

        $seat_layouts =[];

        for ($i=1; $i <= $total_left_seats; $i++) { 
            // code...
            $left_seat_layout_array = [
            'position'=>'left',
            'seat_no'=>'L'.$i,
            'seat_type'=>'seater',
            'is_booked'=>true];

            $seat_layouts[] = $left_seat_layout_array;
            
        }

        for ($i=1; $i <= $total_right_seats; $i++) { 
            // code...
            $right_seat_layout_array = [
            'position'=>'right',
            'seat_no'=>'R'.$i,
            'seat_type'=>'seater',
            'is_booked'=>false];

            $seat_layouts[] = $right_seat_layout_array;
            
        }

        for ($i=1; $i <= $total_back_seats; $i++) { 
            // code...
            $right_seat_layout_array = [
            'position'=>'back',
            'seat_no'=>'B'.$i,
            'seat_type'=>'seater',
            'is_booked'=>true];

            $seat_layouts[] = $right_seat_layout_array;
            
        }

        return response()->json(['success'=>true,'message'=>'success','left_rows'=>$left_rows,'right_rows'=>$right_rows,'left_columns'=>$left_columns,'right_columns'=>$right_columns,'no_of_seats_in_last_row'=>$total_back_seats,'seat_layout'=>$seat_layouts]);


    }


    /**
     * Test Distance Matrix Api
     * @bodyParam pick_lat double required pikup lat of the user
     * @bodyParam pick_lng double required pikup lng of the user
     * @bodyParam drop_lat double required drop lat of the user
     * @bodyParam drop_lng double required drop lng of the user
     * 
     * */
    public function testDistanceMatrixApi(Request $request){

        $request->validate([
        'pick_lat' => 'required',
        'pick_lng' => 'required',
        'drop_lat' => 'required',
        'drop_lng' => 'required',
        'map_key' => 'sometimes|required'
        ]);

        // Test the Distance Matrix by provided lat & long

        if($request->has('map_key') && $request->map_key){

            $distance_matrix_result = get_distance_matrix_of_clients($request->pick_lat, $request->pick_lng, $request->drop_lat, $request->drop_lng,true,$request->map_key);    
        }else{

            $distance_matrix_result = get_distance_matrix($request->pick_lat, $request->pick_lng, $request->drop_lat, $request->drop_lng,true,$request->map_key);
        }
        

        if($distance_matrix_result->status=='OK'){
            return $this->respondSuccess($distance_matrix_result);

        }else{

            return response()->json(['success'=>false,'message'=>'there is an error with your map key','error'=>$distance_matrix_result]);
        }

    }
}
