<?php
namespace App\Http\Controllers\Frontend\User\Kehadiran;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomTeacherController extends Controller{

    public function index(){

        return view('frontend.user.kehadiran.ct.index');

    }


    public function addClass(Request $request){

        $classes = null;

        if($request->has('form')){

            $classes = Classroom::where('form', $request->form)
                ->get();
        }

        return view('frontend.user.kehadiran.ct.add-class', compact('classes'));

    }

    public function viewTodayAttendance($class_id){

        return view('frontend.user.kehadiran.ct.view-today-attendance');

    }

    public function studentList($class_id){

        return view('frontend.user.kehadiran.ct.student-list');

    }

    public function printStudentCard($student_id){

        return view('frontend.user.kehadiran.ct.print-student-card');

    }

    public function printStudentCard2($student_id){

        return view('frontend.user.kehadiran.ct.print-student-card-2');

    }

    public function scan(){

        return view('frontend.user.kehadiran.ct.scan');
    }

    public function scanCheck($student_id){
        return view('frontend.user.kehadiran.ct.scan-check');

//        return redirect()->route('frontend.user.kehadiran.ct.scan-complete', 1)->withFlashSuccess("Kehadiran AMAR MAKRUF berjaya dimasukkan.");
    }

    public function scanInsert($student_id){
        return redirect()->route('frontend.user.kehadiran.ct.scan-complete', 1)->withFlashSuccess("Kehadiran AMAR MAKRUF berjaya dimasukkan.");
    }

    public function scanComplete($student_id){
        return view('frontend.user.kehadiran.ct.scan-complete');
        return view('frontend.user.kehadiran.ct.scan-complete');
    }


}
