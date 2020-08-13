<?php

namespace App\Http\Requests\Frontend\User\Library\Book;

use Illuminate\Foundation\Http\FormRequest;

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
//            'status' => 'required|in:'.implode(', ', array_keys(bookStatus())),
            'remark' => '',
            'payment' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
