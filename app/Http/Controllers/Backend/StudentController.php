<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Student\InsertRequest;
use App\Http\Requests\Frontend\User\Student\UpdateRequest;
use App\Import\StudentImport;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentHasClass;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller{

    public function index(){

        $students = Student::get();

        return view('backend.student.index', compact('students'));

    }

    public function add(Request $request){

        $check = false; $no_ic = ""; $detail = [];

        if($request->has('no_ic')){

            $no_ic = $request->no_ic;

            $myic = new \MyIC();

            $detail = $myic->get($no_ic,'j/m/Y');

            if(!$detail){
                return redirect()->route('admin.student.add')->withErrors(__('Invalid MyKad No.'));
            }

            $student = Student::where('no_ic', $no_ic)->first();

            if($student){
                return redirect()->route('admin.student.add')->withFlashWarning(__('MyKad number registered under :').$student->name);
            }else{
                $check = true;
            }
        }

        $classes = Classroom::get();

        return view('backend.student.add', compact('classes', 'check', 'no_ic', 'detail'));
    }

    public function insert(InsertRequest $request){

        $myic = new \MyIC();

        $detail = $myic->get($request->no_ic,'Y-m-j');

        if(!$detail){
            return redirect()->route('admin.student.add')->withErrors('No. K/P tidak sah!');
        }

        $student = new Student();
        $student->no_ic = $request->no_ic;
        $student->class_id = ($request->class_id == "")? null : $request->class_id;
        $student->name = strtoupper($request->name);
        $student->is_hostel = $request->type; #asrama = 1, harian = 2;
        $student->status  = 1; #1 aktif, 2#pindah, 3tamat,  4 berhenti, 5 lain2
        $student->gender = $detail['gender'];
        $student->dob = $detail['dob'];
        $student->address = "";

        if($student->save()){

            $this->changeStudentClass($student->id, $student->class_id);

            return redirect()->route('admin.student.add')->withFlashSuccess(__('Data inserted'));
        }else{
            return redirect()->route('admin.student.add')->withErrors(__('Failed to insert data'));

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

            return  redirect()->route('admin.student.upload')->withErrors('Tahun tidak tersenarai.');
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
