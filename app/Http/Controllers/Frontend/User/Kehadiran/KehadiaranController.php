<?php
namespace App\Http\Controllers\Frontend\User\Kehadiran;

use App\Http\Controllers\Controller;
use App\Models\UserHasClass;

class KehadiaranController extends Controller{

    public function index(){

        return view('frontend.user.kehadiran.index');

    }

}
