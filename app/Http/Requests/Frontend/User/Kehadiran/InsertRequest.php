<?php

namespace App\Http\Requests\Frontend\User\Kehadiran;

use Illuminate\Foundation\Http\FormRequest;

class InsertRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required',
            'class' => 'required',
            'hostel' => 'required',
            'gender' => 'required',
            'start' => 'required',
            'end' => 'required|after:start',
            'type' => 'required'
        ];
    }
}
