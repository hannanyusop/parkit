<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\UpdateSettingRequest;
use App\Models\Library\Book;
use App\Models\Library\LibOption;

class AdminSettingController extends Controller{

    public function index(){

        return view('frontend.user.library.admin.setting.index');

    }

    public function save(UpdateSettingRequest $request){

        $settings = array('borrow_duration', 'fine', 'max_student_borrow', 'can_borrow');

        foreach ($settings as $name){

            $option = LibOption::where('name', $name)->first();
            $option->value = $request->input($name);
            $option->save();
        }

        return redirect()->route('frontend.user.library.admin.setting.index')->withFlashSuccess('Tetapan berjaya dikemaskini.');
    }

}
