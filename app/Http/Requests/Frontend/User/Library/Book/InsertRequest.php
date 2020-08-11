<?php

namespace App\Http\Requests\Frontend\User\Library\Book;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|min:2',
            'no_per' => 'nullable|integer|min:0|max:99999999',
            'group' => 'required|exists:lib_g_subs,id',
            'author' => 'required|min:2',
            'publisher' => 'required|min:2',
            'pages' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'payment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'no_per.integer' => "Hanya nombor yang dibenarkan untuk no. perolehan",
            'no_per.max' => "Hanya 8 digit dibenarkan untuk no. perolehan!",
            'no_per.min' => "Sila masukan nombor positif."

        ];
    }
}
