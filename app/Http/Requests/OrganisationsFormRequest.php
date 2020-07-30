<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class OrganisationsFormRequest extends FormRequest
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
                'organisation_type_id' => 'nullable',
            'name' => 'required|string|min:1|max:45',
            'address' => 'nullable|string|min:0|max:255',
            'phone_number' => 'nullable|numeric|string|min:0|max:15',
            'email' => 'nullable|string|min:0|max:45',
            'description' => 'nullable|string|min:0|max:255',
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
        $data = $this->only(['organisation_type_id', 'name', 'address', 'phone_number', 'email', 'description']);



        return $data;
    }

}