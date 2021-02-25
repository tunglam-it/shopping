<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name'=>'bail|required|unique:products|max:255|min:10',
            'price'=>'required',
            'contents'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống!!!',
            'name.min'=>'Phải nhiều hơn 10 ký tự',
            'price.required' => 'Không được để trống!!!',
            'contents.required' => 'Không được để trống!!!',
            'category_id.required' => 'Không được để trống!!!',
            'tags.required' => 'Không được để trống!!!',
        ];
    }
}
