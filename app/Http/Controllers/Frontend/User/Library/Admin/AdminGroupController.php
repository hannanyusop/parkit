<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library\Book;
use App\Models\Library\GroupSub;

class AdminGroupController extends Controller{

    public function index(){

        $subGroups = GroupSub::withCount('books')
            ->orderBy('books_count', 'DESC')
            ->get();

        return view('frontend.user.library.admin.book.group.index', compact('subGroups'));

    }

}
