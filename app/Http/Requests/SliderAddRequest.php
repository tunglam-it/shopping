<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name'=>'required|max:255|min:6',
            'description'=>'required',
            'image_path'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không để trống tên slider',
            'name.max' => 'Tối đa 255 kí tự',
            'name.min' => 'Tối thiểu 6 kí tự',
            'description.required' => 'Không để trống mô tả',
            'image_path.required' => 'Không để trống ảnh',
        ];
    }
}
