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
            'form' => '',
            'class' => 'required_without:form',
            'hostel' => 'required',
            'gender' => 'required',
            'category' => 'required',
//            'start' => 'required',
//            'end' => 'required|after:start',
            'type' => 'required'
        ];
    }
}
