<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library\Book;

class VisitorController extends Controller{

    public function today(){

        return view('frontend.user.library.visitor.today');

    }

    public function save(){

        return redirect()->route('frontend.user.library.admin.setting.index')->withFlashSuccess('Tetapan berjaya dikemaskini.');
    }

}
