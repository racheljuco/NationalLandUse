<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CattleKeepersFormRequest extends FormRequest
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
            'type_livestock_id' => 'nullable',
            'number_of_cattle' => 'required|numeric|min:-999999.99|max:999999.99',
            'cattle_keeper_name' => 'required|string|min:1|max:30',
            'division_name' => 'required|string|min:1|max:30',
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
        $data = $this->only(['land_use_plan_id', 'village_id', 'livestock_id', 'type_livestock_id', 'number_of_cattle', 'cattle_keeper_name', 'division_name']);



        return $data;
    }

}