<?php

namespace App\Http\Requests\Frontend\User\Portal\Document;

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
            'group' => 'required',
            'name' => 'required|max:100',
            'description' => '',
            'file' => 'required',
            'is_show' => '',
        ];
    }

    public function messages()
    {
        return [
            'group.id' => 'Sila pilih kategori.',
            'name.required'  => 'Sila masukan tajuk dokumen.',
            'name.max' => 'Tajuk dokumen tidak boleh melebihi 100 huruf',
            'file.required' => 'Sila masukan fail.',
            'is_show' => ''
        ];
    }
}
