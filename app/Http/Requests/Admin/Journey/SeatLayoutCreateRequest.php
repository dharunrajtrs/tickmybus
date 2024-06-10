<?php

namespace App\Http\Requests\Admin\Journey;

use Illuminate\Foundation\Http\FormRequest;

class SeatLayoutCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fleet_id' => 'required',
            'deck_type' => 'required',
            'owner_id' => 'required',
         ];
    }

}
