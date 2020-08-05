<?php

namespace App\Http\Requests\Frontend\User\Campaign;

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
            'name' => ['required', 'max:100'],
            'target_participation' => 'integer|min:1',
            'default_attempt' => 'required|integer|min:1'
        ];
    }
}
