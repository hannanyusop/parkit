<?php

namespace App\Http\Requests\Frontend\User\Library\Booking;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class BookingCheckRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
//        date('Y-m-d', strtotime(date('Y-m-d'). ' -1 day'))
        return [
            'date' => 'date_format:Y-m-d|after:yesterday',
        ];
    }

    public function messages()
    {
        return [
            "date.required" => "Sila pilih tarikh",
            "date.after" => "Sila pilih tarikh hari ini atau seterusnya",
        ];
    }
}
