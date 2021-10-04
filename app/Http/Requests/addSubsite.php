<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addSubsite extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subsiteName' => 'required|min:3',
            'subsiteVisibility' => 'required',
            'subsiteOrder' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
                'subsiteName.required' => 'Pole "nazwa" nie może być puste',
                'subsiteName.min' =>' Nazwa musi zawierać minimum :min znaków'
        ];
    }

}

