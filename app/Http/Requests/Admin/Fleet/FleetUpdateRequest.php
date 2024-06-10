<?php

namespace App\Http\Requests\Admin\Fleet;

use Illuminate\Foundation\Http\FormRequest;

class FleetUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'brand' => 'required',
            'model' => 'required',
            'license_number' => 'required',
            'total_seats' => 'required',
            'multi_img' => 'required',
            'bus_amenties' => 'required',
            
        ];
    }
}
