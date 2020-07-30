<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class VeterinaryFacilityservicesFormRequest extends FormRequest
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
            'livestock_id' => 'nullable',
            'name_division' => 'required|string|min:1|max:30',
            'name_ward' => 'required|string|min:1|max:30',  
            'number_facility_service' => 'required|numeric|min:-999999.99|max:999999.99',
            'number_extension_officer' => 'required|numeric|min:-999999.99|max:999999.99',
            'number_manywesheo' => 'required|numeric|min:-999999.99|max:999999.99',
            'number_livestock' => 'required|numeric|min:-999999.99|max:999999.99',
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
        $data = $this->only(['land_use_plan_id', 'village_id', 'livestock_id', 'name_division', 'name_ward',  'number_facility_service', 'number_extension_officer',  'number_manywesheo', 'number_livestock']);



        return $data;
    }

}