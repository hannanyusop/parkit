<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if(auth()->user()){

            if(auth()->user()->isAdmin()){

                return  redirect()->route('admin.dashboard');
            }else{
                return  redirect()->route('frontend.user.dashboard');
            }
        }else{
            return  redirect()->route('frontend.auth.login');

        }

//        return view('frontend.index');
    }
}
