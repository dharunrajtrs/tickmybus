<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class CancelRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ticket_number' => 'required',
            'account_name' => 'required',
            'user_id' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required',
            'bank_name' => 'required',
        ];
    }
}
