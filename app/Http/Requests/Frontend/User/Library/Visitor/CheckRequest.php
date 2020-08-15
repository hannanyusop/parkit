<?php

namespace App\Http\Requests\Frontend\User\Library\Visitor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class CheckRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'no_ic' => 'required|exists:students'
        ];
    }

    public function messages()
    {
        return [
            'no_ic.required' => 'Sila masukan nombor kad pengenalan pelajar',
            'no_ic.exists' => 'Nombor kad pengenalan pelajar tidak wujud'
        ];
    }
}
