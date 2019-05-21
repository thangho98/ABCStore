<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'unique:product,prod_name,prod_color,prod_memory,'.$this->segment(5).',prod_id'
        ];
    }

    public function messages(){
        return [
            'name.unique' => 'Tên sản phẩm đã tồn tại!'
        ];
    }
}