<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class ParticipantController extends Controller
{

    public function index($campaign_id){
        return view('frontend.user.campaign.participant.index');
    }

    public function view($campaign_id, $participant_id){
        return view('frontend.user.campaign.participant.index');
    }

    public function changeAttempt($campaign_id, $participant_id){
        return view('frontend.user.campaign.participant.change-attempt');
    }

    public function changeAttemptSave($campaign_id, $participant_id){

        return redirect()->route('frontend.user.campaign.participant.index', 'campaign_id')->withSuccess('Attempt Changed!');
    }

    public function dismiss($campaign_id, $participant_id){

        return redirect()->route('frontend.user.campaign.participant.index')->withSuccess('Successfully dismiss participant from campaign!');
    }

    public function voteReset($campaign_id, $participant_id){

        return redirect()->route('frontend.user.campaign.participant.index')->withSuccess('Successfully reset participant\'s vote!');
    }

    public function inviteSearch($campaign_id){
        return view('frontend.user.campaign.participant.invite-search');
    }

    public function invite($campaign_id, $participant_id){

        return redirect()->route('frontend.user.campaign.participant.index')->withSuccess('Successfully reset participant\'s vote!');
    }


}
