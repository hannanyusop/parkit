<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Campaign\InsertRequest;
use App\Http\Requests\Frontend\User\Campaign\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Campaign;

/**
 * Class DashboardController.
 */
class CampaignController extends Controller
{

    public function index(){

        $campaigns = Campaign::where('user_id', auth()->user()->id)
            ->get();
        return view('frontend.user.campaign.index', compact('campaigns'));
    }

    public function add(){

        return view('frontend.user.campaign.add');
    }

    public function insert(InsertRequest $request){

        $dt = explode('-', $request->datetime);

        if(!datetimeChecker($dt[0]) || !datetimeChecker($dt[1])){
            return redirect()->route('frontend.user.campaign.add')->withErrors('Invalid datetime!');
        }

        $campaign = new Campaign();
        $campaign->user_id = auth()->user()->id;
        $campaign->name = $request->name;
        $campaign->code = $request->code;
        $campaign->target_participation = $request->target_participation;
        $campaign->default_attempt = $request->default_attempt;
        $campaign->term = null;
        $campaign->start = new \DateTime($dt[0]);
        $campaign->end = new \DateTime($dt[1]);

        if($campaign->save()){
            return redirect()->route('frontend.user.campaign.index')->withSuccess('Campaign created! Please add Term & Regulation for your campaign.');

        }else{
            return redirect()->route('frontend.user.campaign.add')->withErrors('Failed to create campaign!');

        }


    }

    public function view($campaign_id){

        $campaign = Campaign::where('id', $campaign_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$campaign){
            return  redirect()->route('frontend.user.campaign.index')->withErrors('Campaign not found!');
        }

        return view('frontend.user.campaign.view', compact('campaign'));
    }

    public function edit($campaign_id){

        $campaign = Campaign::where('id', $campaign_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$campaign){
            return  redirect()->route('frontend.user.campaign.index')->withErrors('Campaign not found!');
        }

        $datetime = $campaign->start." - ".$campaign->end;

        return view('frontend.user.campaign.edit', compact('campaign', 'datetime'));
    }

    public function update(UpdateRequest $request, $campaign_id){

        $dt = explode('-', $request->datetime);

        if(!datetimeChecker($dt[0]) || !datetimeChecker($dt[1])){
            return redirect()->route('frontend.user.campaign.add')->withErrors('Invalid datetime!');
        }

        $campaign = Campaign::where('id', $campaign_id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$campaign){
            return  redirect()->route('frontend.user.campaign.index')->withErrors('Campaign not found!');
        }
        $campaign->name = $request->name;
        $campaign->target_participation = $request->target_participation;
        $campaign->default_attempt = $request->default_attempt;
        $campaign->start = new \DateTime($dt[0]);
        $campaign->end = new \DateTime($dt[1]);

        if($campaign->save()){
            return redirect()->route('frontend.user.campaign.index')->withSuccess('Campaign updated! ');

        }else{
            return redirect()->route('frontend.user.campaign.add')->withErrors('Failed to update campaign!');

        }


    }

}
