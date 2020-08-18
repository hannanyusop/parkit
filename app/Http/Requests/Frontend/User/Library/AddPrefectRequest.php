<?php

namespace App\Http\Requests\Frontend\User\Library;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class AddPrefectRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'no_ic' => 'required|exists:students',
        ];
    }

    public function messages()
    {
        return [
            "no_ic.required" => "Sila pilih pelajar",
            "no_ic.exists" => "Nombor kad pengenalan pelajar tidak wujud."
        ];
    }
}
