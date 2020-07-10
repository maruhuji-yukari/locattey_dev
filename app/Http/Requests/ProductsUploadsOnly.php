<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsUploadsOnly extends FormRequest
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
            'product_image1' => 'required | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image2' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image3' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image4' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
            'product_image5' => 'nullable | file | mimes:jpeg,jpg,png,gif | max:30700',
        ];
    }
}
