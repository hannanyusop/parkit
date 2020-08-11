<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library\Book;

class AdminSettingController extends Controller{

    public function index(){

        return view('frontend.user.library.admin.setting.index');

    }

    public function save(){

        return redirect()->route('frontend.user.library.admin.setting.index')->withFlashSuccess('Tetapan berjaya dikemaskini.');
    }

}
