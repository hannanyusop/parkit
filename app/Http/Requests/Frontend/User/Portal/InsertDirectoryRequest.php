<?php

namespace App\Http\Requests\Frontend\User\Portal;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class InsertDirectoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'group' => 'required',
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|max:1014',
            'order' => 'numeric',
            'email' => '',
            'phone' => ''
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
