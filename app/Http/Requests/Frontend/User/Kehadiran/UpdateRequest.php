<?php

namespace App\Http\Requests\Frontend\User\Kehadiran;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required',
//            'start' => 'required',
//            'end' => 'required|after:start',
            'type' => 'required'
        ];
    }
}
