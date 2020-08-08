<?php

namespace App\Http\Requests\Frontend\User\Cv;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateProfileRequest.
 */
class CheckinRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'temperature' =>  "required|numeric|min:29|max:40",
        ];
    }
}
