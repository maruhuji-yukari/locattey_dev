<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required | max:20',
            'subject' => 'required | max:30',
            'email' => 'required | email',
            'comment' => 'required | max:1000',
            'reply' => 'required | in:必要,不要'
        ];
    }
}
