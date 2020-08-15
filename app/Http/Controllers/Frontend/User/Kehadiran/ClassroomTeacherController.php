<?php
namespace App\Http\Controllers\Frontend\User\Kehadiran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Classroom\InsertRequest;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassroomTeacherController extends Controller{

    public function index(){

        $classes = Classroom::where('is_active', 1)
            ->orderBy('generate_name', 'ASC')
            ->get();

        return view('frontend.user.kehadiran.ct.index', compact('classes'));

    }


    public function addClass(Request $request){

        $classes = null;

        if($request->has('form')){

            $classes = Classroom::where('form', $request->form)
                ->get();
        }

        return view('frontend.user.kehadiran.ct.add-class', compact('classes'));

    }

    public function insertClass(InsertRequest $request){


        $class = new Classroom();

        $class->created_by = auth()->user()->id;
        $class->form = $request->form;
        $class->name = $request->name;
        $class->generate_name = $request->generate_name;
        $class->is_active = 1;

        if($class->save()){
            return redirect()->route('frontend.user.kehadiran.ct.index')->withFlashSuccess("Kelas ".$class->generate_name." berjaya didaftarkan.");
        }else{
            return redirect()->route('frontend.user.kehadiran.ct.index')->withErrors("Gagal daftar kelas!");
        }


    }

    public function viewTodayAttendance($class_id){

        return view('frontend.user.kehadiran.ct.view-today-attendance');

    }

    public function studentList($class_id){

        $class = Classroom::find($class_id);

        if(!$class){
            return redirect()->route('frontend.user.kehadiran.ct.index')->withFlashError('Kelas tidak wujud!');
        }


        return view('frontend.user.kehadiran.ct.student-list', compact('class'));

    }

    public function printStudentCard($student_id){

        $student = Student::find($student_id);

        if(!$student){
            return redirect()->route('frontend.user.kehadiran.ct.index')->withFlashError('Maklumat pelajar tidak wujud!');
        }

        if(is_null($student->class_id)){
            return redirect()->route('frontend.user.kehadiran.ct.index')->withFlashError('Pelajar tidak mempunyai kelas. Sila kemaskini maklumat pelajar terlebih dahulu!');
        }

        return view('frontend.user.kehadiran.ct.print-student-card', compact('student'));

    }

    public function printStudentCard2($student_id){

        $student = Student::find($student_id);

        if(!$student){
            return redirect()->route('frontend.user.kehadiran.ct.index')->withFlashError('Maklumat pelajar tidak wujud!');
        }

        if(is_null($student->class_id)){
            return redirect()->route('frontend.user.kehadiran.ct.index')->withFlashError('Pelajar tidak mempunyai kelas. Sila kemaskini maklumat pelajar terlebih dahulu!');
        }

        return view('frontend.user.kehadiran.ct.print-student-card-2', compact('student'));

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
