<?php

namespace App\Http\Requests\Frontend\User\Library\Book;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class UpdateParentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|min:2',
            'group' => 'required|exists:lib_g_subs,id',
            'author' => 'required|min:2',
            'publisher' => 'required|min:2',
            'is_fiction' => 'required',
            'is_borrow' => 'required',
            'pages' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
