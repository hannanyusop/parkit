<?php

use Carbon\Carbon;

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


function datetimeChecker($datetime){

    $valid = true;

    try {
        $date = new DateTime($datetime);
    } catch (Exception $e) {
        $valid = false;
    }

    return $valid;
}

function badgeCampaignStatus($status){

    $statuses = [
        1 => "<span class=\"badge bg-primary\">Active</span>",
        2 => "<span class=\"badge bg-warning\">Paused</span>",
        3 => "<span class=\"badge bg-danger\">Inactive</span>"
    ];

    return $statuses[$status];
}

function ucGenrator(){

    $exist = true;

    do{

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $card = \App\Models\Card::where('uc_number', $randomString)
            ->first();

        if(!$card){
            $exist = false;
        }

    }while($exist);

    return $randomString;

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
