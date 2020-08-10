<?php
namespace App\Http\Controllers\Frontend\User\Library;

use App\Http\Controllers\Controller;

class BorrowController extends Controller{

    public function borrowBook(){
        return view('frontend.user.library.borrow.borrow-book');
    }

    public function returnBook(){
        return view('frontend.user.library.borrow.return-book');
    }

    public function late(){
        return view('frontend.user.library.borrow.late');
    }


}
