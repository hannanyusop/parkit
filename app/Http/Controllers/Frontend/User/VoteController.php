<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class VoteController extends Controller
{

    public function index(){
        return view('frontend.user.vote.index');
    }

    public function apply(){
        return view('frontend.user.vote.apply');
    }

    public function applyInsert(Request $request){

        return redirect()->route('frontend.user.vote.index' )->withFlashSuccess('Successful! Please wait for approval from campaign management.');
    }

    public function rules($campaign_code){

        return view('frontend.user.vote.rules');
    }

    public function now($campaign_code){

        return view('frontend.user.vote.now');
    }

    public function check($campaign_code){

        return redirect()->route('frontend.user.vote.result', $campaign_code)->withFlashSuccess('Completed. Thanks!');
    }

    public function result($id){

        return view('frontend.user.vote.result');
    }
}
