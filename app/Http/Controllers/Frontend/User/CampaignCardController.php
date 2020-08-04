<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

class CampaignCardController extends Controller
{
    public function index(){

        return view('frontend.user.campaign.card.index');

    }

    public function add(){
        return view('frontend.user.campaign.card.add');
    }

    public function insert($campaign_id){

        return  redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withSuccess('New Card Inserted!');
    }

    public function edit($campaign_id, $id){
        return view('frontend.user.campaign.card.add');
    }
    public function update($campaign_id, $id){

        return  redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withSuccess('Card Updated!');
    }

    public function delete($campaign_id, $id){

        return  redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withSuccess('Card Deleted!');
    }


}
