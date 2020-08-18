<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\AddPrefectRequest;
use App\Http\Requests\Frontend\User\Library\UpdateSettingRequest;
use App\Models\Library\Book;
use App\Models\Library\LibOption;
use App\Models\Student;

class AdminSettingController extends Controller{

    public function index(){

        $json = getLibraryOption('prefect_list', '[]');
        $prefects = json_decode($json);


        $students = Student::where('status', 1)->get();

        return view('frontend.user.library.admin.setting.index', compact('students', 'prefects'));

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

    public function addPrefect(AddPrefectRequest $request){

        $json = getLibraryOption('prefect_list', '[]');
        $prefects = json_decode($json, true);

        $no_ic = $request->no_ic;

        if(isset($prefects[$no_ic])){

            return redirect()->route('frontend.user.library.admin.setting.index')->withFlashWarning("Pelajar tersebut sudah dalam senarai!");
        }

        $student = Student::where('no_ic', $no_ic)->first();

        if(!$student){
            return redirect()->route('frontend.user.library.admin.setting.index')->withFlashWarning("Pelajar tidak wujud!");
        }
        $prefects[$no_ic] = $student->name;


        $option = LibOption::where('name', 'prefect_list')->first();
        $option->value = json_encode($prefects);

        if($option->save()){
            return redirect()->route('frontend.user.library.admin.setting.index')->withFlashSuccess("Pelajar telah dimasukan!");
        }

        dd('error');

    }
    public function removePrefect($no_ic){

        $json = getLibraryOption('prefect_list', '[]');
        $prefects = json_decode($json, true);

        unset($prefects[$no_ic]);

        $option = LibOption::where('name', 'prefect_list')->first();
        $option->value = json_encode($prefects);

        if($option->save()){
            return redirect()->route('frontend.user.library.admin.setting.index')->withFlashSuccess("Pelajar telah singkirkan dari senarai pengwas!");
        }

        dd('error');

    }

}
