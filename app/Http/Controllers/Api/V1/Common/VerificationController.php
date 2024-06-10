<?php

namespace App\Http\Controllers\Api\V1\Common;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\UserDetails;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Web\BaseController;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Models\Request\Request as RequestRequest;
use App\Base\Constants\Setting\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;



class VerificationController extends BaseController
{

   
 /**
  * Verify Purchase Code
  * 
  * 
  * */  
 public function purchaseCode($purchase_code)
    {

    $code = getPurchaseCode($purchase_code);


    if(isset($code->error)){
          
            return $this->throwCustomException('No sale belonging to the current user found with that code');         

        }else if($code == null){

          return $this->throwCustomException('invalid purchase code');
        }
        else{
            // $users = array();
          
            $users['name'] = $code->item->name;
            $users['sold_at'] = $code->sold_at;
            $users['license'] = $code->license;
            $users['buyer_name'] = $code->buyer;
            $users['item_id'] = $code->item->id;

           return $this->respondSuccess($users);         
            
        }


    }


    
}
