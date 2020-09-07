<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class AsramaController extends Controller{

    public function direktori(){

        return view('portal.asrama.direktori');
    }

    public function kemudahan(){

        return view('portal.asrama.kemudahan');
    }

    public function dewanMakan(){

        return view('portal.asrama.dewan-makan');
    }

    public function surau(){

        return view('portal.asrama.surau');
    }
}
