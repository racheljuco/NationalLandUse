<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class MineralDetailsFormRequest extends FormRequest
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
            'mineral_id' => 'nullable',
            'mining_type' => 'required|string|min:1|max:30',
            'mineral_exploitation_modality' => 'required|string|min:1|max:30',
            'total_are_for_mining' => 'required|numeric|min:-999999.99|max:999999.99',
            'market_name' => 'required|string|min:1|max:30',
            'year',
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
        $data = $this->only(['land_use_plan_id', 'village_id', 'mineral_id', 'mining_type', 'mineral_exploitation_modality', 'total_are_for_mining', 'market_name', 'year']);



        return $data;
    }

}