<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class GazettesFormRequest extends FormRequest
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
            'gn_number' => 'required|numeric|string|min:1|max:15',
            'title' => 'required|string|min:1|max:45',
            'published_date' => 'nullable|date_format:j/n/Y',
            'expired_date' => 'nullable|date_format:j/n/Y',
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
        $data = $this->only(['land_use_plan_id', 'gn_number', 'title', 'published_date', 'expired_date']);



        return $data;
    }

}