<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class MainController extends Controller{

    public function home(){

        return view('portal.home');
    }
}
