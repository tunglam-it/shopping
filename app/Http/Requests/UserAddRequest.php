<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required|min:6',
            'role_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không để trống tên user',
            'name.max' => 'Tối đa 255 kí tự',
            'email.required' => 'Không để trống email',
            'password.required' => 'Không để trống password',
            'password.min' => 'Tối thiểu 6 kí tự',
            'role_id.min' => 'Không để trống vai trò',
        ];
    }
}
