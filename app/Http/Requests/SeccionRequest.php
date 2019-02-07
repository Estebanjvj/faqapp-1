<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeccionRequest extends FormRequest
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
            'name' => 'required',
            'icon' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'icon.required' => 'El ícono es requirido.',
            'description.required' => 'Es necesario una descripción.'
        ];
    }
}
