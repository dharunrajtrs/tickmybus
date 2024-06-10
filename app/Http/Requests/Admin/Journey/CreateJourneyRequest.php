<?php

namespace App\Http\Requests\Admin\Journey;

use Illuminate\Foundation\Http\FormRequest;

class CreateJourneyRequest extends FormRequest
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
            'depature_at' => 'required',
            'arrived_at' => 'required',
            'from_city_id' => 'required',
            'to_city_id' => 'required',
            // 'duration' => 'required',

        ];
    }

}
