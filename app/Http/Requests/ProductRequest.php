<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    //登録時のルール
    public function rules()
    {
        return [
            'product_name'=> 'required | string | max:255',
            'product_describe' => 'required | string | max:500',
            'product_image1' => 'required | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image2' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image3' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image4' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image5' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
            'categories_id' => 'required | Integer | max:22',
            'trade_flag' => 'bool'
        ];
    }
}
