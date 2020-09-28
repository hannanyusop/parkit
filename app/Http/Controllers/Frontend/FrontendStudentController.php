<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class FrontendStudentController extends Controller{

    public function info(Request $request){

        if($request->id){

            $student = Student::where('no_ic', $request->id)
                ->first();

            if(!$student){
                return redirect()->route('frontend.student-search')->withErrors('Data Pelajar tidak wujud');
            }

            return  view('frontend.student.info', compact('student'));

        }else{
            return redirect()->route('frontend.student-search')->withErrors('Data Pelajar tidak wujud');
        }
    }

    public function search(){

        return view('frontend.student.search');
    }
}