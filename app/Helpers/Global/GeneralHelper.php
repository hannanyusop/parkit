<?php

use Carbon\Carbon;
use LaravelQRCode\Facades\QRCode;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Laravel Boilerplate');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     *
     * @return Carbon
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (! function_exists('datetimeChecker')) {

    function datetimeChecker($datetime)
    {

        $valid = true;

        try {
            $date = new DateTime($datetime);
        } catch (Exception $e) {
            $valid = false;
        }

        return $valid;
    }
}

if (! function_exists('badgeCampaignStatus')) {

    function badgeCampaignStatus($status)
    {

        $statuses = [
            1 => "<span class=\"badge bg-primary\">Active</span>",
            2 => "<span class=\"badge bg-warning\">Paused</span>",
            3 => "<span class=\"badge bg-danger\">End</span>"
        ];

        return $statuses[$status];
    }
}

if (! function_exists('ucGenrator')) {

    function ucGenrator()
    {

        $exist = true;

        do {

            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 8; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $card = \App\Models\Card::where('uc_number', $randomString)
                ->first();

            if (!$card) {
                $exist = false;
            }

        } while ($exist);

        return $randomString;

    }
}


if (! function_exists('campaignStatus')) {
    function campaignStatus($status)
    {
        $statuses = [
            1 => "Active",
            2 => "Paused",
            3 => "Inactive"
        ];

        return $statuses[$status];
    }
}

if(!function_exists('getQr')){

    function getQr($token){

        return QRCode::url(route('frontend.user.cv.event.checkin', $token ))
            ->setSize(9)
            ->setMargin(2)
            ->svg();
    }
}

if(!function_exists('getKehadiranStudent')){

    function getKehadiranStudent($ic){

        return QRCode::url(route('frontend.user.cv.event.checkin', $ic ))
            ->setSize(4)
            ->setMargin(2)
            ->svg();
    }
}

if (! function_exists('eventTokenGenerator')) {

    function eventTokenGenerator(){

        $exist = true;

        do {

            $characters = '1234567890qwertyuiopasdfghjklzxcvbnm';
            $charactersLength = strlen($characters);
            $token = '';
            for ($i = 0; $i < 8; $i++) {
                $token .= $characters[rand(0, $charactersLength - 1)];
            }

            $event = \App\Models\CvEvent::where('token', $token)
                ->first();

            if (!$event) {
                $exist = false;
            }

        } while ($exist);

        return $token;

    }
}

if (! function_exists('eventManualTokenGenerator')) {

    function eventManualTokenGenerator(){

        $exist = true;

        do {

            $characters = '123456789';
            $charactersLength = strlen($characters);
            $token = '';
            for ($i = 0; $i < 6; $i++) {
                $token .= $characters[rand(0, $charactersLength - 1)];
            }

            $event = \App\Models\CvEvent::where('manual_token', $token)
                ->first();

            if (!$event) {
                $exist = false;
            }

        } while ($exist);

        return $token;

    }
}

if (! function_exists('eventStaticTokenGenerator')) {

    function eventStaticTokenGenerator(){

        $exist = true;

        do {

            $characters = '1234567890qwertyuiopasdfghjklzxcvbnm';
            $charactersLength = strlen($characters);
            $token = '';
            for ($i = 0; $i < 6; $i++) {
                $token .= $characters[rand(0, $charactersLength - 1)];
            }

            $event = \App\Models\CvEvent::where('static_token', $token)
                ->first();

            if (!$event) {
                $exist = false;
            }

        } while ($exist);

        return $token;

    }
}

if (! function_exists('badgeEventStatus')) {

    function badgeEventStatus($status)
    {

        $statuses = [
            1 => "<span class=\"badge bg-success\">Active</span>",
            2 => "<span class=\"badge bg-dark\">Inactive</span>"
        ];

        return $statuses[$status];
    }
}

if(!function_exists('reformatDatetime')){

    function reformatDatetime($datetime, $format = 'd-m-Y H:i:s'){
        return date($format, strtotime($datetime));
    }

}

if(!function_exists('getForm')){

    function getForm(){
        return [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
        ];
    }

}

if(!function_exists('visitorStatus')){

    function visitorStatus($status){

        $statuses = [
            1 => "<span class=\"badge bg-success\">Aktif</span>",
            2 => "<span class=\"badge bg-dark\">Daftar Keluar</span>"
        ];

        return $statuses[$status];
    }

}

if(!function_exists('getBookId')){

    function getBookId($id){
       return sprintf('%08d', $id);
    }

}

if(!function_exists('getBarCode')){

    function getBarCode($id, $width = 4, $height = 33){

        return '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG(getBookId($id), 'C39',$width,$height) . '" alt="'.getBookId($id).'"   /><br><small class="text-center">'.getBookId($id).'</small>';
    }
}

if(!function_exists('barCodePrint')){

    function barCodePrint($id, $width = 4, $height = 33){

        $book = \App\Models\Library\Book::find($id);

        return '<div class="text-center"><small>HAK MILIK PERPUSTAKAN SMK AGAMA LIMBANG <br> </small><img src="data:image/png;base64,' . DNS1D::getBarcodePNG(getBookId($id), 'C39',$width,$height) . '" alt="'.getBookId($id).'"   />
                  <br><small class="text-center"><b> '.bookShortCode($id).'</b> '.substr($book->parent->title, 0,50).'
                     <br>HARGA : '.displayPrice($book->parent->price).'
                    </small></div>';
    }
}

if(!function_exists('bookShortCode')){

    function bookShortCode($id){

        $book = \App\Models\Library\Book::find($id);

        return $book->parent->subGroup->code." ".substr($book->parent->author->name, 0,3);
    }
}

if(!function_exists('displayPrice')){

    function displayPrice($money, $currency = "RM"){

        return $currency." ".number_format((float)$money, 2, '.', '');

    }
}

if(!function_exists('hideString')){

    function hideString($string,int $length,  $code = 'X'){

        $sl = strlen($string) - $length;

        $hidden = "";

        if($length < $sl) {
            while($sl >= 0){
                $hidden .= $code;
                $sl--;
            }
        }

        $front = substr_replace($string, 0, -3);

        return $front.$hidden;

    }
}
