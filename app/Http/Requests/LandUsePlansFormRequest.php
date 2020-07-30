<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class LandUsePlansFormRequest extends FormRequest
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
            'village_id' => 'nullable|numeric|min:0',
            'land_use_plan_status_id' => 'nullable',
            'name' => 'required|string|min:1|max:45',
            'description' => 'nullable|string|min:0|max:255',
            'created_date' => 'required|date',
            'status' => 'boolean',
            'file' => 'nullable',
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
        $data = $this->only(['village_id', 'land_use_plan_status_id', 'name', 'description', 'created_date', 'status', 'file']);

        $data['status'] = $this->has('status');


        return $data;
    }

}