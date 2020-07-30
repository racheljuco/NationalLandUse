<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class LandUsePlanFarmInputsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'land_use_plan_id' => 'required',
            'farm_input_id' => 'required',
            'Status' => 'boolean',
            'type_input' => 'nullable|string|min:0|max:60',
            'average_price' => 'required|numeric|min:-999999.99|max:999999.99',
            'source_input' => 'nullable|string|min:0|max:60',
            'availabity' => 'boolean',
        ];
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['land_use_plan_id', 'farm_input_id', 'Status', 'type_input', 'average_price', 'source_input', 'availabity']);

        $data['Status'] = $this->has('Status');
        $data['availabity'] = $this->has('availabity');


        return $data;
    }

}