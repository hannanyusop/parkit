<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

class DownloadController extends Controller{

    public function borang(){

        return view('portal.download.borang');
    }
}
