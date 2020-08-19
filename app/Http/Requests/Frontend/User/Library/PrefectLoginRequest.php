<?php

namespace App\Http\Requests\Frontend\User\Library;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class PrefectLoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'no_ic' => 'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
