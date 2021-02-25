<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'bail|required|unique:settings|max:255',
            'config_value' => 'bail|required|unique:settings'
        ];
    }

    public function messages()
    {
        return [
            'config_key.required'=>'Không được để trống trường này!',
            'config_value.required'=>'Không được để trống trường này!'
        ];
    }
}
