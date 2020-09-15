<?php

namespace App\Http\Requests\Frontend\User\Portal;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class EditDirectoryRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png|max:1014',
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
