<?php
namespace App\Http\Controllers\Frontend\User\Library;

use App\Http\Controllers\Controller;

class MainController extends Controller{

    public function index(){
        return view('frontend.user.library.index');
    }

    public function prefectLogin(){
        dd('aSA');
        return view('frontend.user.library.prefect-login');
    }

}
