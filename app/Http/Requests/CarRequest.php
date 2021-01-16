<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'production_year' => 'required|date|before:tomorrow',
            'travelled_kilometers' => 'required|min:0|max:1000000',
            'manufacturer_id' => 'required',
            'models_car_id' => 'required',
            'image' => 'required|image',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please provide valid name which is between 3 and 255 characters.',
            'name.min' => 'Please provide valid name which is between 3 and 255 characters.',
            'name.max' => 'Please provide valid name which is between 3 and 255 characters.',
        ];
    }
}
