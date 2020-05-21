<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalCreateFormRequest extends FormRequest
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
            'identificacion' => 'unique:personal,identificacion',
        ];
    }

    public function messages()
    {
        return [
            'identificacion.unique' => 'Ya existe un personal con esa identificacion',
        ];
    }
}
