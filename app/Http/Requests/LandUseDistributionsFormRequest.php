<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class LandUseDistributionsFormRequest extends FormRequest
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
                'land_use_plan_id' => 'nullable',
            'village_area' => 'required|numeric|min:-999999.99|max:999999.99',
            'projected_households' => 'required|numeric|min:-999999.99|max:999999.99',
            'year_preparation' => 'required|string|min:1|max:255',
            'settlement' => 'required|numeric|min:-999999.99|max:999999.99',
            'social_service' => 'required|numeric|min:-999999.99|max:999999.99',
            'agriculture' => 'required|numeric|min:-999999.99|max:999999.99',
            'agriculture_settlement' => 'required|numeric|min:-999999.99|max:999999.99',
            'grazing' => 'required|numeric|min:-999999.99|max:999999.99',
            'utilization_forest' => 'required|numeric|min:-999999.99|max:999999.99',
            'reserved_forest' => 'required|numeric|min:-999999.99|max:999999.99',
            'other_reserved_land' => 'required|numeric|min:-999999.99|max:999999.99',
            'water_sources' => 'required|numeric|min:-999999.99|max:999999.99',
            'wma' => 'required|numeric|min:-999999.99|max:999999.99',
            'land_bank' => 'required|numeric|min:-999999.99|max:999999.99',
            'land_investment' => 'required|numeric|min:-999999.99|max:999999.99',
            'quarrying' => 'required|numeric|min:-999999.99|max:999999.99',
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
        $data = $this->only(['land_use_plan_id', 'village_area', 'projected_households', 'year_preparation', 'settlement', 'social_service', 'agriculture', 'agriculture_settlement', 'grazing', 'utilization_forest', 'reserved_forest', 'other_reserved_land', 'water_sources', 'wma', 'land_bank', 'land_investment', 'quarrying']);



        return $data;
    }

}