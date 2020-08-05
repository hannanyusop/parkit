<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Card;
use App\Models\Join;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class VoteController extends Controller
{

    public function index(){

        $joins = Join::where('user_id', auth()->user()->id)
            ->get();

        return view('frontend.user.vote.index', compact('joins'));
    }

    public function apply(Request $request){

        $campaign = null;

        if($request->has('code')){

            $campaign = Campaign::where('code', $request->code)
                ->first();
        }
        return view('frontend.user.vote.apply', compact('campaign'));
    }

    public function applyInsert($campaign_code){

        $campaign = Campaign::where('code', $campaign_code)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.vote.index' )->withSuccess('Invalid campaign!');
        }

        $check = Join::where('user_id', auth()->user()->id)
            ->where('campaign_id', $campaign->id)
            ->first();

        if($check){
            return redirect()->route('frontend.user.vote.index' )->withErrors('You already join this campaign!');
        }

        $join = new Join();
        $join->user_id = auth()->user()->id;
        $join->campaign_id = $campaign->id;
        $join->attempt = $campaign->default_attempt;
        $join->status = 1;
        $join->agree = 0;
        $join->invited = 0;
        $join->approve = 0;

        if($join->save()){
            return redirect()->route('frontend.user.vote.index' )->withSuccess('Successful! Please wait for approval from campaign management.');
        }else{
            return  redirect()->route('frontend.user.vote.apply', $campaign_code)->withErrors('Failed to join campaign!');
        }

    }

    public function rules($campaign_code){

        $campaign = Campaign::where('code', $campaign_code)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.vote.index' )->withSuccess('Invalid campaign!');
        }

        $join = Join::where('user_id', auth()->user()->id)
            ->where('campaign_id', $campaign->id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Please apply to join the campaign!');
        }

        #checking eligble start
        $attempt = $join->attempt;
        $done = $join->cards($campaign->id)->count();

        $left = $attempt-$done;

        if(!$join){
            return redirect()->route('frontend.user.vote.index')->withErrors('Not eligible to vote!');
        }elseif($join->approve == 0 && $join->invited == 0){
            return redirect()->route('frontend.user.vote.index')->withErrors('Please wait for Approval from Campaign Management!');
        }

        if($left <=  0){
            return redirect()->route('frontend.user.vote.index')->withErrors('No attempt left!');
        }
        #end checking

        if($join->agree == 1){
            return redirect()->route('frontend.user.vote.now', $campaign_code);
        }

        return view('frontend.user.vote.rules', compact('campaign_code' , 'campaign'));
    }

    public function now($campaign_code){

        $campaign = Campaign::where('code', $campaign_code)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Invalid campaign!');
        }

        $join = Join::where('user_id', auth()->user()->id)
            ->where('campaign_id', $campaign->id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Please apply to join the campaign!');
        }

        #checking eligble start
        $attempt = $join->attempt;
        $done = $join->cards($campaign->id)->count();

        $left = $attempt-$done;

        if(!$join){
            return redirect()->route('frontend.user.vote.index')->withErrors('Not eligible to vote!');
        }elseif($join->approve == 0 && $join->invited == 0){
            return redirect()->route('frontend.user.vote.index')->withErrors('Please wait for Approval from Campaign Management!');
        }

        if($left <=  0){
            return redirect()->route('frontend.user.vote.index')->withErrors('No attempt left!');
        }
        #end checking

        $cards = Card::where('campaign_id', $campaign->id)
            ->where('user_id', null)
            ->get();

        return view('frontend.user.vote.now', compact('cards', 'campaign', 'left'));
    }

    public function check(Request $request, $campaign_code){


        $campaign = Campaign::where('code', $campaign_code)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Invalid campaign!');
        }

        $join = Join::where('user_id', auth()->user()->id)
            ->where('campaign_id', $campaign->id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Please apply to join the campaign!');
        }

        #checking eligble start
        $attempt = $join->attempt;
        $done = $join->cards($campaign->id)->count();

        $left = $attempt-$done;

        if(!$join){
            return redirect()->route('frontend.user.vote.index')->withErrors('Not eligible to vote!');
        }elseif($join->approve == 0 && $join->invited == 0){
            return redirect()->route('frontend.user.vote.index')->withErrors('Please wait for Approval from Campaign Management!');
        }

        if($left <=  0){
            return redirect()->route('frontend.user.vote.index')->withErrors('No attempt left!');
        }
        #end checking

        $card = Card::where('uc_number', $request->code)
            ->where('campaign_id', $campaign->id)
            ->where('user_id', null)
            ->first();

        if(!$card){
            return redirect()->route('frontend.user.vote.now', $campaign_code)->withErrors('Invalid card!');
        }

        Join::where('campaign_id', $campaign->id)
            ->where('user_id', auth()->user()->id)
            ->update(['agree' => 1]);

        $card->user_id = auth()->user()->id;
        $card->draw_on = now();

        if($card->save()){
            return redirect()->route('frontend.user.vote.result', [$campaign_code, $request->code])->withErrors('Thank You!!');
        }else{
            return redirect()->route('frontend.user.vote.index')->withErrors('Sorry! System error. Code :1X100 . Please contact administrator');
        }


    }

    public function result($campaign_code, $uc){



        $campaign = Campaign::where('code', $campaign_code)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Invalid campaign!');
        }

        $card = Card::where('uc_number', $uc)
            ->where('campaign_id', $campaign->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$card){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Invalid card!');
        }

        $join = Join::where('user_id', auth()->user()->id)
            ->where('campaign_id', $campaign->id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Please apply to join the campaign!');
        }
        $done = $join->cards($campaign->id)->count();
        $attempt = $join->attempt;
        $left = $attempt-$done;

        return view('frontend.user.vote.result', compact('card', 'campaign', 'left'));
    }

    public function resultFull($campaign_code){

        $campaign = Campaign::where('code', $campaign_code)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Invalid campaign!');
        }

        $join = Join::where('user_id', auth()->user()->id)
            ->where('campaign_id', $campaign->id)
            ->first();

        if(!$join){
            return redirect()->route('frontend.user.vote.index' )->withErrors('Please apply to join the campaign!');
        }

        return view('frontend.user.vote.result-full', compact('campaign', 'join'));

    }

    #ajax
    public function shuffleCard(Request $request, $campaign_code){

        if($request->ajax()){

            $campaign = Campaign::where('code', $campaign_code)->first();


            $cards = Card::where('campaign_id', $campaign->id)
                ->where('user_id', null)
                ->get();

            $collection = collect($cards);
            $shuffled = $collection->shuffle();
            $shuffled->all();

            $data = array(
                'code'  => $shuffled->first()->uc_number,
                'count' => $cards->count()
            );

            echo json_encode($data);
        }

    }

}
