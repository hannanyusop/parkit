<?php

namespace App\Http\Requests\Frontend\User\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateProfileRequest.
 */
class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'max:150'],
//            'no_ic' => 'required|min:12:max:12|unique:students,no_ic,'.$this->no_ic,
            'class_id' => 'nullable|exists:classes,id',
//            'dob' => 'date_format:j/m/Y|before:today',
            'type' => 'required|in:'.implode(', ', array_keys(studentType())),
            'status' => 'required|in:'.implode(', ', array_keys(studentStatus())),
        ];
    }
}
