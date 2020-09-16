<?php

namespace App\Http\Requests\Frontend\User\Library\Booking;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class CreateBookingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
//        date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day'))

//        dd($this->request->get('start'));
        return [
            'date' => 'required|date_format:Y-m-d|after:yesterday',
            'start' => 'required',
            'end' => 'required|after:start',
            'purpose' => 'required',
            'staff_notes' => '',
        ];
    }

    public function messages()
    {
        return [
            "date.required" => "Sila pilih tarikh",
            "date.after" => "Sila pilih tarikh hari ini atau seterusnya",
            "date.date" => "Format tarikh tidak tepat",
            'start.required' => "Sila pilih jam mula",
            "end.required" => "Sila pilih jam tamat",
            "end.after" => "Sila masukan jam tamat yang betul",
            "purpose.required" => "Sila masukan tujuan",
        ];
    }
}
