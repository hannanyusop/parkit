<?php

namespace App\Http\Requests\Frontend\User\Library\Borrow;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class AddListRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id' => 'required|exists:lib_books,id',
            'no_ic' => 'required|exists:students'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Sila masukan nombor perolehan buku',
            'id.exists' => 'Nombor perolehan tidak wujud',
            'no_ic.required' => 'Sila masukan nombor kad pengenalan pelajar',
            'no_ic.exists' => 'Nombor kad pengenalan pelajar tidak wujud'
        ];
    }
}
