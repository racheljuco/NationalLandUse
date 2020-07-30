<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CultivatedLandYieldsFormRequest extends FormRequest
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
            'village_id' => 'nullable|numeric|min:0',
            'crop_id' => 'nullable',
            'actual_cultivated_land' => 'required|numeric|min:-999999.99|max:999999.99',
            'possible_yield' => 'required|numeric|min:-999999.99|max:999999.99',
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
        $data = $this->only(['land_use_plan_id', 'village_id', 'crop_id', 'actual_cultivated_land', 'possible_yield']);



        return $data;
    }

}