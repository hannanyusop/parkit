<?php

namespace App\Http\Requests\Frontend\User\Classroom;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateProfileRequest.
 */
class InsertRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'form' => 'required|integer|min:1|max:6',
            'name' => 'required',
            'generate_name' => 'required|unique:classes',
        ];
    }
}
