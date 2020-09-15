<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Portal\PortalDirectory;
use App\Models\Portal\PortalPage;
use App\Models\Portal\PortalText;

class SmkalController extends Controller{

    public function pengenalan(){

        $route = request()->route()->getName();

        $page = PortalPage::where('route', $route)->first();

        $pengenalan = PortalText::where('page_id', $page->id)->where('name', 'pengenalan')->first();

        $pencapaianSekolah = PortalText::where('page_id', $page->id)->where('name', 'pencapaianSekolah')->first();

        $kurikulumAkedemik = PortalText::where('page_id', $page->id)->where('name', 'kurikulumAkedemik')->first();

        $kokurikulum = PortalText::where('page_id', $page->id)->where('name', 'kokurikulum')->first();

        return view('portal.smkal.pengenalan', compact('pengenalan', 'pencapaianSekolah', 'kurikulumAkedemik', 'kokurikulum'));
    }

    public function pengetua(){

        $route = request()->route()->getName();

        $page = PortalPage::where('route', $route)->first();

        $perutusan = PortalText::where('page_id', $page->id)->where('name', 'perutusan')->first();

        return view('portal.smkal.pengetua', compact('perutusan'));
    }

    public function organisasi(){

        $route = request()->route()->getName();
        $page = PortalPage::where('route', $route)->first();

        $staffs = PortalDirectory::where('page_id', $page->id)
            ->where('group', 'staff')
            ->orderBy('order', 'ASC')
            ->get();

        return view('portal.smkal.organisasi', compact('staffs'));
    }

    public function visi(){

        return view('portal.smkal.visi');
    }


}
