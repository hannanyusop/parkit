<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Card;
use App\Models\Join;
use Illuminate\Http\Request;

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

        $join = Join::where('user_id', $participant_id)
            ->where('campaign_id', $campaign_id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Participant not found!');
        }

        return view('frontend.user.campaign.participant.change-attempt', compact('join'));
    }

    public function changeAttemptSave(Request $request, $campaign_id, $participant_id){

        $join = Join::where('user_id', $participant_id)
            ->where('campaign_id', $campaign_id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Participant not found!');
        }

        $join->attempt = $request->attempt;

        if($join->save()){
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withFlashSuccess('Participant attempt updated!');

        }else{
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Failed to update participant attempt!');
        }

    }

    public function dismiss($campaign_id, $participant_id){

        $join = Join::where('user_id', $participant_id)
            ->where('campaign_id', $campaign_id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Participant not found!');
        }

        $card = Card::where('campaign_id', $campaign_id)
            ->where('user_id', $participant_id)
            ->update(['user_id' => null]);

        if($join->delete()){
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withFlashSuccess('Successfully dismiss participant from campaign!');
        }else{
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Failed to dismiss participant from campaign!');
        }

    }

    public function voteReset($campaign_id, $participant_id){

        $join = Join::where('user_id', $participant_id)
            ->where('campaign_id', $campaign_id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Participant not found!');
        }

        $join->update(['agree' => 0]);

        Card::where('campaign_id', $campaign_id)
            ->where('user_id', $participant_id)
            ->update(['user_id' => null, 'draw_on' => null]);

        return redirect()->route('frontend.user.campaign.view', $campaign_id)->withFlashSuccess('Successfully reset participant\'s vote!');
    }

    public function inviteSearch(Request $request, $campaign_id){

        $users = null;


        if($request->has('unique_id')){

            $users = User::where('name', 'like', '%'.$request->unique_id.'%')
                ->orWhere('unique_id', 'like', '%'.$request->unique_id.'%')
                ->orWhere('email', 'like', '%'.$request->unique_id.'%')
                ->get();
        }

        return view('frontend.user.campaign.participant.invite-search', compact('campaign_id', 'users'));
    }

    public function invite($campaign_id, $participant_id){

        #check if user valid
        $user = User::find($participant_id);

        if(!$user){
            return  redirect()->route('frontend.user.campaign.participant.invite-search', $campaign_id)->withErrors('User not found!');
        }

        #check if campaign exist
        $campaign = Campaign::where('id', $campaign_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$campaign){
            return  redirect()->route('frontend.user.campaign.index')->withErrors('Campaign not found!');
        }

        #check if users already register
        $registered = Join::where('user_id', $participant_id)
            ->where('campaign_id', $campaign_id)
            ->first();

        if($registered){
            return  redirect()->route('frontend.user.campaign.participant.invite-search', $campaign_id)->withErrors('This user already joined this campaign!');
        }

        $join = new Join();
        $join->user_id = $participant_id;
        $join->campaign_id = $campaign_id;
        $join->attempt = $campaign->default_attempt;
        $join->status = 1;
        $join->agree = 0;
        $join->invited = 1;
        $join->approve = 0;

        if($join->save()){
            return  redirect()->route('frontend.user.campaign.participant.invite-search', $campaign_id)->withFlashSuccess('Successfully invite user!');
        }else{
            return  redirect()->route('frontend.user.campaign.participant.invite-search', $campaign_id)->withErrors('Failed to invite user!');
        }
    }

    public function approve($campaign_id, $participant_id){

        #check if user valid
        $user = User::find($participant_id);

        if(!$user){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('User not found!');
        }

        #check if campaign exist
        $campaign = Campaign::where('id', $campaign_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$campaign){
            return  redirect()->route('frontend.user.campaign.index')->withErrors('Campaign not found!');
        }

        #check if users already register
        $join = Join::where('user_id', $participant_id)
            ->where('campaign_id', $campaign_id)
            ->first();

        if(!$join){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Not found!!');
        }

        if($join->invited == 1){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withFlashWarning('This user already joined this campaign!');
        }

        $join->approve = 1;

        if($join->save()){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withFlashSuccess('Successful!');
        }

    }

    public function decline($campaign_id, $participant_id){

        #check if user valid
        $user = User::find($participant_id);

        if(!$user){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('User not found!');
        }

        #check if campaign exist
        $campaign = Campaign::where('id', $campaign_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$campaign){
            return  redirect()->route('frontend.user.campaign.index')->withErrors('Campaign not found!');
        }

        #check if users already register
        $join = Join::where('user_id', $participant_id)
            ->where('campaign_id', $campaign_id)
            ->first();

        if(!$join){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Not found!!');
        }

        if($join->invited == 1){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withFlashWarning('You cannot decline invited participant.\!');
        }

        if($join->delete()){
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withFlashSuccess('Successfully decline applicant! !');
        }else{
            return  redirect()->route('frontend.user.campaign.view', $campaign_id)->withErrors('Failed decline applicant! !');
        }


    }


}
