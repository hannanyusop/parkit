<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library\Book;

class AdminGroupController extends Controller{

    public function index(){

        return view('frontend.user.library.admin.book.group.index');

    }

}