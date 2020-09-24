<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Portal\PortalDirectory;
use App\Models\Portal\PortalDownload;
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

    public function dokumentasi(){

        $docs = PortalDownload::where('group', 'dokumen-asrama')
            ->get();

        return view('portal.asrama.dokumentasi', compact('docs'));
    }

    public function dokumentasiFail($id){

        $doc = PortalDownload::where('group', 'dokumen-asrama')
            ->findOrFail($id);

        return view('portal.asrama.dokumentasiFail', compact('doc'));
    }

    public function halatuju(){

        return view('portal.asrama.halatuju');

    }

    public function bmb(){

        $docs = PortalDownload::where('group', 'bmb')
            ->get();

        return view('portal.asrama.perkhidmatan-kontrak.bmb', compact('docs'));
    }

    public function bkb(){

        $docs = PortalDownload::where('group', 'bkb')
            ->get();

        return view('portal.asrama.perkhidmatan-kontrak.bkb', compact('docs'));
    }

    public function ppk(){

        $docs = PortalDownload::where('group', 'ppk')
            ->get();

        return view('portal.asrama.perkhidmatan-kontrak.ppk', compact('docs'));
    }
}
