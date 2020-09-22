<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\Book\Group\InsertRequest;
use App\Models\Library\Book;
use App\Models\Library\GroupParent;
use App\Models\Library\GroupSub;

class AdminGroupController extends Controller{

    public function index(){

        $parents = GroupParent::get();

        $subGroups = GroupSub::withCount('books')
            ->orderBy('books_count', 'DESC')
            ->get();

        return view('frontend.user.library.admin.book.group.index', compact('subGroups', 'parents'));

    }

    public function insert(InsertRequest $request){

        $group = new GroupSub();

        $group->g_parent_id = $request->first_dewey;
        $group->code = $request->dewey_code;
        $group->name = $request->dewey_name;

        $group->save();
        return redirect()->route('frontend.user.library.admin.book.group.index')
            ->withFlashSuccess('Pengkelasan Dewey berjaya ditambah');

    }

}
