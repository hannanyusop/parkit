<?php

namespace App\Http\Controllers\Frontend\User\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Student\InsertRequest;
use App\Http\Requests\Frontend\User\Student\UpdateRequest;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

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
        $student->status  = $request->status; #1 aktif, 2#pindah, 3tamat,  4 berhenti, 5 lain2
        $student->gender = $request->gender;
        $student->address = $request->address;

        if($student->save()){
            return redirect()->route('frontend.user.student.index')->withFlashSuccess('Data '.$student->name.' berjaya dikemaskini.');
        }else{
            return redirect()->route('frontend.user.student.index')->withErrors('Data pelajar gagal dikemaskini.');

        }
    }
}
