<?php

namespace App\Http\Controllers\Frontend\User\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentMainController extends Controller{

    public function index(Request $request){

        $users = null;

        if($request->has('search')){

            $users = Student::where('name', 'LIKE', '%'.$request->search.'%')
                ->where('no_ic', 'LIKE', '%'.$request->search.'%')
                ->get();
        }

        return view('frontend.user.student.index', compact('users'));

    }

    public function add(Request $request){


        if($request->has('no_ic')){

            $myic = new \MyIC();

            $detail = $myic->get($request->no_ic,'Y-m-j');

            if(!$detail){
                return redirect()->route('frontend.user.student.add')->withErrors('No. K/P tidak sah!');
            }

            dd($detail);

            $check = Student::where('no_ic', $request->no_ic)->first();
        }

        $classes = Classroom::get();

        return view('frontend.user.student.add', compact('classes'));
    }

    public function insert(Request $request){


        $student = new Student();



        $student->user_id = auth()->user()->id;
        $student->no_ic = $request->no_ic;
        $student->class_id = ($request->class_id == "")? null : $request->class_id;
        $student->name = strtoupper($request->name);
        $student->type = $request->type; #asrama = 1, harian = 2;
        $student->status  = 1; #1 aktif, 2#pindah, 3tamat,  4 berhenti, 5 lain2
        $student->gender = $request->gender;
        $student->address = $request->address;

        if($student->save()){
            return redirect()->route('frontend.user.student.add')->withFlashSuccess('Data pelajar berjaya dimasukan.');
        }else{
            return redirect()->route('frontend.user.student.add')->withErrors('Data pelajar gagal dimasukan.');

        }
    }

    public function edit(){

        return view('frontend.user.student.edit');
    }

    public function update(Request $request, $student_id){

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
            return redirect()->route('frontend.user.student.index')->withFlashSuccess('Data pelajar berjaya dikemaskini.');
        }else{
            return redirect()->route('frontend.user.student.index')->withErrors('Data pelajar gagal dikemaskini.');

        }
    }
}
