<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Portal\PortalDirectory;
use App\Models\Portal\PortalPage;

class AsramaController extends Controller{

    public function direktori(){


        $route = request()->route()->getName();
        $page = PortalPage::where('route', $route)->first();

        $staffs = PortalDirectory::where('page_id', $page->id)
            ->where('group', 'staff-asrama')
            ->orderBy('order', 'ASC')
            ->get();
        return view('portal.asrama.direktori', compact('staffs'));
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
