<?php

namespace App\Http\Requests\Frontend\User\Portal\Announcement;

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
            'title' => 'required|max:100',
            'text' => 'required',
            'is_show' => '',
            'show_until' => 'required|date|after:date',
            'date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'group.required' => 'Sila pilih kumpulan',
            'title.required' => 'Sila masukan tajuk Pengumuman',
            'show_until.required' => 'Sila pilih tarikh papar sehingga',
            'show_until.date' => 'Format tarikh papar sehingga tidak tepat',
            'show_until.after' => 'Sila pilih tarikh papar sehingga sebelum tarikh Pengumuman',
            'date' => 'Sila pilih tarikh Pengumuman',
            'date.date' => 'Format tarikh Pengumuman tidak tepat'
        ];
    }
}
