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

}
