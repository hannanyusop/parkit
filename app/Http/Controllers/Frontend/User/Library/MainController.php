<?php
namespace App\Http\Controllers\Frontend\User\Library;

use App\Http\Controllers\Controller;

class MainController extends Controller{

    public function index(){
        return view('frontend.user.library.index');
    }

}
