<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class CampaignController extends Controller
{

    public function index(){
        return view('frontend.user.campaign.index');
    }

    public function add(){

        return view('frontend.user.campaign.add');
    }

    public function insert(){

        return redirect()->route('frontend.user.campaign.index');
    }

    public function view($campaign_id){

        return view('frontend.user.campaign.view');
    }
}
