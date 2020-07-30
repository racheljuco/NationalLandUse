<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class FishDetailsFormRequest extends FormRequest
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
            'fish_id' => 'nullable',
            'fishing_type' => 'required|numeric|min:-999999.99|max:999999.99',
            'fishing_place' => 'required|string|min:1|max:30',
            'fisher_number' => 'required|numeric|min:-999999.99|max:999999.99',
            'fish_amount' => 'required|numeric|min:-999999.99|max:999999.99',
            'year' => 'required|string|min:1|max:255',
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
        $data = $this->only(['land_use_plan_id', 'village_id', 'fish_id', 'fishing_type', 'fishing_place', 'fisher_number', 'fish_amount', 'year']);



        return $data;
    }

}