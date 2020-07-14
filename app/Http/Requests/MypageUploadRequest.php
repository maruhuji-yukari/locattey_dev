<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MypageUploadRequest extends FormRequest
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
            //プロフアイコンをアップロード。3MB以下
            //jpeg,jpg,gif,pngのみ
            'prof_img' => 'required | file | mimes:jpeg,jpg,png,gif | max:30700',
        ];
    }
}
