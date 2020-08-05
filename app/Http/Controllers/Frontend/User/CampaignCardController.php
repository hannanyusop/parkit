<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Card;
use Illuminate\Http\Request;

class CampaignCardController extends Controller
{
    public function index($campaign_id){

        $campaign = Campaign::where('id', $campaign_id)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.campaign.index' )->withErrors('Invalid campaign!');
        }

        $cards = Card::where('campaign_id', $campaign_id)
            ->orderBy('is_won', 'DESC')
            ->get();

        return view('frontend.user.campaign.card.index', compact('campaign', 'cards'));

    }

    public function insert(Request $request, $campaign_id){

        $current = 1;

        do{
            $card = new Card();
            $card->campaign_id = $campaign_id;
            $card->user_id = null;
            $card->uc_number = ucGenrator(); #generate using helper
            $card->is_won = ($request->won == 1)? 1 : 0;
            $card->prize = $request->prize;
            $card->save();

            $current++;

        }while($current < $request->duplicate);

        return  redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withSuccess('New Card Inserted!');
    }

    public function edit($campaign_id, $id){

        $campaign = Campaign::where('id', $campaign_id)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.campaign.index' )->withErrors('Invalid campaign!');
        }

        $card = Card::find($id);

        if(!$card){
            return redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withErrors('Card does not exist!');
        }

        return view('frontend.user.campaign.card.edit', compact('card', 'campaign'));
    }
    public function update(Request $request, $campaign_id, $id){

        $campaign = Campaign::where('id', $campaign_id)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.campaign.index' )->withErrors('Invalid campaign!');
        }

        $card = Card::find($id);

        if(!$card){
            return redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withErrors('Card does not exist!');
        }

        $card->prize = $request->prize;
        $card->is_won = $request->won;

        if($card->save()){
            return redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withSuccess('Card updated!');
        }else{
            return redirect()->route('frontend.user.campaign.card.edit', [$campaign_id, $id])->withErrors('Failed to update card!');
        }



        return  redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withSuccess('Card Updated!');
    }

    public function delete($campaign_id, $id){

        $campaign = Campaign::where('id', $campaign_id)
            ->first();

        if(!$campaign){
            return redirect()->route('frontend.user.campaign.index' )->withErrors('Invalid campaign!');
        }

        $card = Card::find($id);

        if(!$card){
            return redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withErrors('Card does not exist!');
        }else{
            $card->delete();
            return  redirect()->route('frontend.user.campaign.card.index', $campaign_id)->withSuccess('Card Deleted!');

        }

    }


}
