<?php

namespace App\Http\Controllers\Frontend\User\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Student\InsertRequest;
use App\Http\Requests\Frontend\User\Student\UpdateRequest;
use App\Import\StudentImport;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentHasClass;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentMainController extends Controller{

    public function index(Request $request){

        $students = null;

        if($request->has('search')){

            $students = Student::where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('no_ic', 'LIKE', '%'.$request->search.'%')
                ->get();
        }

        return view('frontend.user.student.index', compact('students'));

    }

    public function view($student_id){

        $student = Student::find($student_id);

        if(!$student){
            return redirect()->back()->withErrors('Data Pelajar tidak wujud');
        }
        return view('frontend.user.student.view', compact('student'));
    }

    public function add(Request $request){

        $check = false; $no_ic = ""; $detail = [];

        if($request->has('no_ic')){

            $no_ic = $request->no_ic;

            $myic = new \MyIC();

            $detail = $myic->get($no_ic,'j/m/Y');

            if(!$detail){
                return redirect()->route('frontend.user.student.add')->withErrors('No. K/P tidak sah!');
            }

            $student = Student::where('no_ic', $no_ic)->first();

            if($student){
                return redirect()->route('frontend.user.student.add')->withFlashWarning('No K/P telah didaftarkan atas nama     '.$student->name);
            }else{
                $check = true;
            }
        }

        $classes = Classroom::get();

        return view('frontend.user.student.add', compact('classes', 'check', 'no_ic', 'detail'));
    }

    public function insert(InsertRequest $request){

        $myic = new \MyIC();

        $detail = $myic->get($request->no_ic,'Y-m-j');

        if(!$detail){
            return redirect()->route('frontend.user.student.add')->withErrors('No. K/P tidak sah!');
        }

        $student = new Student();
        $student->user_id = auth()->user()->id;
        $student->no_ic = $request->no_ic;
        $student->class_id = ($request->class_id == "")? null : $request->class_id;
        $student->name = strtoupper($request->name);
        $student->type = $request->type; #asrama = 1, harian = 2;
        $student->status  = 1; #1 aktif, 2#pindah, 3tamat,  4 berhenti, 5 lain2
        $student->gender = $detail['gender'];
        $student->dob = $detail['dob'];
        $student->address = "";

        if($student->save()){

            $this->changeStudentClass($student->id, $student->class_id);

            return redirect()->route('frontend.user.student.add')->withFlashSuccess('Data pelajar berjaya dimasukan.');
        }else{
            return redirect()->route('frontend.user.student.add')->withErrors('Data pelajar gagal dimasukan.');

        }
    }

    public function edit($student_id){

        $student = Student::find($student_id);

        if(!$student){
            return redirect()->route('frontend.user.student.index')->withErrors('Data pelajar tidak wujud.');
        }

        $classes = Classroom::get();

        return view('frontend.user.student.edit', compact('student', 'classes'));
    }

    public function update(UpdateRequest $request, $student_id){

        $student = Student::find($student_id);

        if(!$student){
            return redirect()->route('frontend.user.student.index')->withErrors('Data pelajar tidak wujud.');
        }


        $student->no_ic = $request->no_ic;
        $student->name = strtoupper($request->name);
        $student->type = $request->type; #asrama = 1, harian = 2;
        $student->class_id = ($request->class_id == "")? null : $request->class_id;
        $student->status  = $request->status; #1 aktif, 2#pindah, 3tamat,  4 berhenti, 5 lain2
        $student->gender = $request->gender;
        $student->address = $request->address;

        if($student->save()){
            $this->changeStudentClass($student->id, $student->class_id);
            return redirect()->back()->withFlashSuccess('Data '.$student->name.' berjaya dikemaskini.');
        }else{
            return redirect()->back()->withErrors('Data pelajar gagal dikemaskini.');

        }
    }

    public function changeStudentClass($student_id, $class_id){

        $student_has_class = StudentHasClass::where('student_id', $student_id)
            ->where('year', date("Y"))
            ->first();

        #class management
        if(!is_null($class_id)){

            if($student_has_class){
                #just update class
                $student_has_class->update(['class_id' => $class_id]);
            }else{
                #create new one
                $new_has_class = new StudentHasClass();
                $new_has_class->student_id = $student_id;
                $new_has_class->class_id = $student_id;
                $new_has_class->year = date('Y');

                if(!$new_has_class->save()){
                    dd("error to assign student to new class");
                }
            }
        }else{

            if($student_has_class){
                $student_has_class->delete();
            }
            #remove data

        }
    }

//    public function import(){
//
//        return view('frontend.user.student.import');
//
//    }
//
//    public function upload(Request $request){
//
//       $result = Excel::import(new StudentImport(), $request->file('file'));
//
//       return redirect()->route('frontend.user.student.index')->withFlashSuccess('Data pelajar berjaya dikemaskini');
//
//
//    }
}
