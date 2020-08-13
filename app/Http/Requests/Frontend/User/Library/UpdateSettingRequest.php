<?php

namespace App\Http\Requests\Frontend\User\Library;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class UpdateSettingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'can_borrow' => 'required|in:0,1',
            'borrow_duration' => 'required|integer|min:1',
            'fine' => 'required|numeric:min:0',
            'max_student_borrow' => 'required|integer:min:1',
        ];
    }

    public function messages()
    {
        return [
            'no.per.unique' => "Nombor Perolehan sudah digunakan",
            'no_per.integer' => "Hanya nombor yang dibenarkan untuk no. perolehan",
            'no_per.max' => "Hanya 8 digit dibenarkan untuk no. perolehan!",
            'no_per.min' => "Sila masukan nombor positif."

        ];
    }
}
