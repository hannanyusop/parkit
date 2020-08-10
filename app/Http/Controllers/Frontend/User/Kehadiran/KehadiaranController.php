<?php
namespace App\Http\Controllers\Frontend\User\Kehadiran;

use App\Http\Controllers\Controller;

class KehadiaranController extends Controller{

    public function index(){

        return view('frontend.user.kehadiran.index');

    }

}
