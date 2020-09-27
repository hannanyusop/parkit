<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Student\UpdateRequest;
use App\Import\StudentImport;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller{

    public function index(){

        $students = Student::get();

        return view('backend.student.index', compact('students'));

    }

    public function view($id){

        $student = Student::find($id);

        if(!$student){
            return redirect()->back()->withErrors('Data Pelajar tidak wujud');
        }
        return view('backend.student.view', compact('student'));
    }

    public function edit($student_id){

        $student = Student::find($student_id);

        if(!$student){
            return redirect()->route('frontend.user.student.index')->withErrors('Data pelajar tidak wujud.');
        }

        $classes = Classroom::get();

        return view('backend.student.edit', compact('student', 'classes'));
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

    public function import(){

        $years = array(date('Y'), date('Y')+1);

        return view('backend.student.import', compact('years'));

    }

    public function upload(Request $request){

        $years = array(date('Y'), date('Y')+1);

        if(!in_array($request->year, $years)){


            dd('not in');
        }

        session()->put('year', $request->year);

        try {

            Excel::import(new StudentImport(), $request->file('file'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->back()->withFlashSuccess('Data pelajar berjaya dikemaskini');


    }

    public function reset(){

        $characters = 'qwertyuiopasdfghjklzxcvbnm';
        $charactersLength = strlen($characters);
        $key = '';
        for ($i = 0; $i < 6; $i++) {
            $key .= $characters[rand(0, $charactersLength - 1)];
        }

        session()->put('key', $key);

        return view('backend.student.reset', compact('key'));
    }

    public function resetNow(Request $request){

        if($request->key == session('key')){

            $total = Student::where('status', 1)->count();


            $students = Student::where('status', 1)
                ->update(['class_id' => 0, 'status' => 3]);

            Classroom::where('is_active', 1)
                ->update(['user_id' => null]);

            return redirect()->route('admin.student.index')->withFlashSuccess($total. " pelajar telah di nyaktifkan");

        }else{
            return  redirect()->back()->withErrors('Kunci pengesahana tidak sah!');
        }

    }


}
