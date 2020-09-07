<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class SmkalController extends Controller{

    public function pengenalan(){

        return view('portal.smkal.pengenalan');
    }

    public function pengetua(){

        return view('portal.smkal.pengetua');
    }

    public function organisasi(){

        return view('portal.smkal.organisasi');
    }

    public function visi(){

        return view('portal.smkal.visi');
    }


}
