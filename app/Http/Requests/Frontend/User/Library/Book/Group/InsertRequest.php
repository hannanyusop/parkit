<?php

namespace App\Http\Requests\Frontend\User\Library\Book\Group;

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
            'first_dewey' => 'required|exists:lib_g_subs,id',
            'dewey_code' => 'integer|min:0|max:1000|unique:lib_g_subs,code',
            'dewey_name' => 'required|unique:lib_g_subs,name',
        ];
    }

    public function messages()
    {
        return [
            'first_dewey.required' => 'Sila pilih pengeklasan pertama',
            'first_dewey.exists' => 'Pengekelasan Pertama Tidak wujud',
            'dewey_code.integer' => 'Sila masukan hanya nombor bagi kod dewey',
            'dewey_code.min' => 'Sila masukan sekurang kurangnya 0 bagi kod dewey',
            'dewey_code.max' => 'Kod dewey 0-1000',
            'dewey_code.unique' => 'Kod dewey sudah wujud',
            'dewey_name.required' => 'Sila masukan nama pengkelasan dewey',
            'dewey_name.unique' => 'Nama dewey telah wujud'
        ];
    }
}
