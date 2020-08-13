<?php

use Carbon\Carbon;
use LaravelQRCode\Facades\QRCode;
use App\Models\Library\LibOption;

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

if(!function_exists('isBorrow')){

    function isBorrow($status){

        $statuses = [
            1 => "<span class=\"badge bg-success\">Boleh Dipinjam</span>",
            0 => "<span class=\"badge bg-dark\">Tidak Boleh Dipinjam</span>"
        ];

        return $statuses[$status];
    }

}

if(!function_exists('isFiction')){

    function isFiction($status){

        $statuses = [
            1 => "<span class=\"badge bg-success\">Fiksyen</span>",
            0 => "<span class=\"badge bg-info\">Bukan Fiksyen</span>"
        ];

        return $statuses[$status];
    }

}


if(!function_exists('bookStatus')){

    function bookStatus($status = null){

        $statuses = [
            1 => "Tersedia",
            2 => "Dipinjam",
            3 => "Dilupuskan"
        ];

        return (is_null($status))? $statuses : $statuses[$status];
    }

}

if(!function_exists('badgeBookStatus')){

    function badgeBookStatus($status){

        $statuses = [
            1 => "<span class=\"badge bg-success\">Tersedia</span>",
            2 => "<span class=\"badge bg-info\">Dipinjam</span>",
            3 => "<span class=\"badge bg-info\">Dilpuskan</span>"
        ];

        return $statuses[$status];
    }

}

if(!function_exists('studentType')){

    function studentType($type = null   ){

        $types = [
           1 => "ASRAMA",
            2 => "HARIAN"
        ];

        return (isset($type)) ? $types[$type] : $types;
    }
}

if(!function_exists('badgeStudentType')){

    function badgeStudentType($type){

        $types = [
            1 => "<span class=\"badge bg-success\">ASRAMA</span>",
            2 => "<span class=\"badge bg-info\">HARIAN</span>",
        ];

        return $types[$type];
    }
}

if(!function_exists('getGender')){

    function getGender($type = null){

        $types = [
            'M' => "LELAKI",
            'F' => "PERMPUAN"
        ];

        return (isset($type)) ? $types[$type] : $types;
    }
}

if(!function_exists('badgeStudentStatus')){

    function badgeStudentStatus($status){

        $statuses = [
            1 => "<span class=\"badge bg-success\">AKTIF</span>",
            2 => "<span class=\"badge bg-info\">PINDAH</span>",
            3 => "<span class=\"badge bg-primary\">TAMAT</span>",
            4 => "<span class=\"badge bg-warning\">BERHENTI</span>",
            5 => "<span class=\"badge bg-warning\">LAIN-LAIN</span>",
        ];

        return $statuses[$status];
    }
}

if(!function_exists('studentStatus')){

    function studentStatus($status = null){

        $statuses = [
            1 => "AKTIF",
            2 => "PINDAH",
            3 => "TAMAT",
            4 => "BERHENTI",
            5 => "LAIN-LAIN"
        ];

        return (isset($status)) ? $statuses[$status] : $statuses;
    }
}

if(!class_exists('MyIC')){
    class MyIC {

        private	$state;
        private	$gender;
        private	$dob;


        /**
         * Get the detail from IC number
         *
         * @access	public
         * @param	string	The raw IC number
         * @param	string	The date format to use
         * @return 	array	The detail
         */
        public function get($ic_no, $date_format = 'j F Y')
        {
            // strip out all non-numeric characters
            $ic_no = preg_replace('/[^0-9]/', '', $ic_no);

            if ( ! empty($ic_no))
            {
                // if the numbers is less than 12 digits
                if (strlen($ic_no) != 12)
                {
                    return FALSE;
                }

                // send it to function to split it
                $sections = $this->split($ic_no);

                // get the DOB
                $this->get_dob($sections['dob']);

                // get the state
                $this->get_state($sections['state']);

                // get the gender
                $this->get_gender($sections['code']);

                $detail = array(
                    'dob'     => date($date_format, $this->dob),
                    'state'   => $this->state,
                    'gender'  => $this->gender
                );

                return $detail;
            }

            return FALSE;
        }


        /**
         * Splitting the code given to the proper sections
         *
         * @access	private
         * @param	string	The IC number
         * @return 	array	The sections
         */
        private function split($code = NULL)
        {
            if ( ! empty($code))
            {
                // the output array
                $output = array();

                // split the number into 2 sections
                $sect = str_split($code, 6);

                // the DOB section
                $output['dob']	= $sect[0];

                // now get the state code
                $other = str_split($sect[1], 2);

                // assign it to the output
                $output['state'] = $other[0];

                // then, from the last array item in $code, get
                // the last item to be use when checking for gender
                $output['code'] = $other[1].$other[2];

                return $output;
            }
        }


        /**
         * Get state based on the 2 digits code
         *
         * @access	private
         * @param	integer	The 2 digits state code
         * @return 	string	The state name
         */
        private function get_state($code = NULL)
        {
            if ( ! empty($code))
            {
                switch ($code)
                {
                    case '01':
                    case '21':
                    case '22':
                    case '23':
                    case '24':
                        $this->state = 'Johor';
                        break;

                    case '02':
                    case '25':
                    case '26':
                    case '27':
                        $this->state = 'Kedah';
                        break;

                    case '03':
                    case '28':
                    case '29':
                        $this->state = 'Kelantan';
                        break;

                    case '04':
                    case '30':
                        $this->state = 'Melaka';
                        break;

                    case '05':
                    case '31':
                    case '59':
                        $this->state = 'Negeri Sembilan';
                        break;

                    case '06':
                    case '32':
                    case '33':
                        $this->state = 'Pahang';
                        break;

                    case '07':
                    case '34':
                    case '35':
                        $this->state = 'Penang';
                        break;

                    case '08':
                    case '36':
                    case '37':
                    case '38':
                    case '39':
                        $this->state = 'Perak';
                        break;

                    case '09':
                    case '40':
                        $this->state = 'Perlis';
                        break;

                    case '10':
                    case '41':
                    case '42':
                    case '43':
                    case '44':
                        $this->state = 'Selangor';
                        break;

                    case '11':
                    case '45':
                    case '46':
                        $this->state = 'Terengganu';
                        break;

                    case '12':
                    case '47':
                    case '48':
                    case '49':
                        $this->state = 'Sabah';
                        break;

                    case '13':
                    case '50':
                    case '51':
                    case '52':
                    case '53':
                        $this->state = 'Sarawak';
                        break;

                    case '14':
                    case '54':
                    case '55':
                    case '56':
                    case '57':
                        $this->state = 'Wilayah Persekutuan Kuala Lumpur';
                        break;

                    case '15':
                    case '58':
                        $this->state = 'Wilayah Persekutuan Labuan';
                        break;

                    case '16':
                        $this->state = 'Wilayah Persekutuan Putrajaya';
                        break;

                    case '82':
                    default:
                        $this->state = 'Others';
                        break;

                }
            }
        }


        /**
         * Get gender based on the last 4 digits code
         *
         * @access	private
         * @param	integer	The 4 digits IC number
         * @return 	string	The gender
         */
        private function get_gender($code = NULL)
        {
            if ( ! empty($code))
            {
                // convert it to integer
                $code = intval($code);

                // basically, the last digit will determine the
                // gender; odd for Male and even for Female
                if ($code % 2 === 0)
                {
                    $this->gender	= 'F';
                }
                else
                {
                    $this->gender	= 'M';
                }
            }
        }


        /**
         * Get date of birth from the first 6 digits
         *
         * @access	private
         * @param	integer	The first 6 digits IC number
         * @return 	string	The date of birth
         */
        private function get_dob($code = NULL)
        {
            if ( ! empty($code))
            {
                // split it into 3 section, 2 digits per section
                $dob = str_split($code, 2);

                // get the day
                $day = $dob[2];

                // get the month
                $month = $dob[1];

                // get the integer value for the year
                $year = intval($dob[0]);

                // we need to add 1900 to the year
                if ($year >= 50)
                {
                    $year += 1900;
                }

                // now convert it into the string and assign it to
                // our variable
                $this->dob = strtotime($year.'-'.$month.'-'.$day);
            }
        }

    }

}

if(!function_exists('getCurrentClassroomTeacher')){

    function getCurrentClassroomTeacher($user_id = null){

        if(is_null($user_id)){
            return "TIADA GURU KELAS";
        }else{

            $user = \App\Domains\Auth\Models\User::find($user_id);

            return ($user)? $user->name : "DATA TIDAK WUJUD";
        }
    }
}

if(!function_exists('getDewey')){

    function getDewey(){

        return \App\Models\Library\GroupParent::get();

    }
}

if(!function_exists('getLibraryOption')){

    function getLibraryOption($name, $default = ''){

        $option = LibOption::where('name', $name)->first();

        if(!$option){
            $option = new LibOption();
            $option->name = $name;
            $option->value = $default;
            $option->save();
        }

        return $option->value;
    }
}

if(!function_exists('getStudentClass')){

    function getStudentClass($class_id = null){

        if(is_null($class_id)){
            return "TIADA KELAS";
        }

        $class = \App\Models\Classroom::find($class_id);

        return ($class)? $class->generate_name : "KELAS TIDAK SAH";

    }

}

