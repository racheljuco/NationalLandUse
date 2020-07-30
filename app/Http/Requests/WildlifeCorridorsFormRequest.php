<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class WildlifeCorridorsFormRequest extends FormRequest
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
            'wildlife_id' => 'nullable',
            'name_division' => 'required|string|min:1|max:30',
            'name_ward' => 'required|string|min:1|max:30',
            'wildlife_corridor_name' => 'required|string|min:1|max:30',
            

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
        $data = $this->only(['land_use_plan_id', 'village_id', 'name_division', 'wildlife_id', 'name_ward', 'wildlife_corridor_name']);



        return $data;
    }

}