<?php
namespace App\Http\Controllers\Frontend\User\Kehadiran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Classroom\InsertRequest;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\StudentHasClass;
use App\Models\UserGenerateAttendance;
use App\Models\UserHasClass;
use Illuminate\Http\Request;

class ClassroomTeacherController extends Controller{

    public function index(){

        $classes = Classroom::where('is_active', 1)
            ->orderBy('generate_name', 'ASC')
            ->get();

        return view('frontend.user.kehadiran.ct.index', compact('classes'));

    }

    public function today(){

        $uHasClass = UserHasClass::where('user_id', auth()->user()->id)
            ->where('year', date('Y'))
            ->first();

        if(!$uHasClass){

            return redirect()->route('frontend.user.student.index')->withFlashWarning("Anda tidak mempunyai mana-mana kelas.");
        }

        $today = UserGenerateAttendance::whereDate('created_at', '=', date('Y-m-d'))
            ->where('class_id', $uHasClass->class_id)
            ->first();


        return view('frontend.user.kehadiran.ct.today', compact('today', 'uHasClass'));
    }

    public function todayGenerate($class_id){

        $uHasClass = UserHasClass::where('user_id', auth()->user()->id)
            ->where('year', date('Y'))
            ->where('class_id', $class_id)
            ->first();


        if(!$uHasClass){

            return redirect()->route('frontend.user.student.index')->withFlashWarning("Kelas ini bukan dibawah pemantauan anda.");
        }

        $today = UserGenerateAttendance::whereDate('created_at', '=', date('Y-m-d'))
            ->where('class_id', $uHasClass->class_id)
            ->first();

        if($today){
            return redirect()->route('frontend.user.kehadiran.ct.today')->withFlashWarning("Kehadiran untuk kelas ".$classroom->generate_name. " sudah dijana.");
        }

        //create
        $today = new UserGenerateAttendance();
        $today->class_id = $uHasClass->class_id;
        $today->user_id = auth()->user()->id;

        if(!$today->save()){
            dd("Failed to save user generate att");
        }

        $students = StudentHasClass::where('class_id', $uHasClass->class_id)
            ->where('year', date('Y'))
            ->get();

        if($students->count() == 0){
            return redirect()->route('frontend.user.kehadiran.ct.today')->withFlashWarning("Kelas ".$uHasClass->classroom->generate_name. " tidak mempunyai pelajar.");
        }

        foreach ($students as $student){


            //prevent from duplicate enrty
            StudentAttendance::updateOrCreate(
                ['uga_id' => $today->id, 'student_id' => $student->id],
                [
                    'status' => 1,
                    'temperature' => null,
                    'remark' => null,
                ]
            );
        }

        return redirect()->route('frontend.user.kehadiran.ct.today')->withFlashSuccess("Senrai kehadiran bagi kelas ".$uHasClass->classroom->generate_name." berjaya dijana.");

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

    public function scanCheck(Request $request){

        if($request->has('id')){

            $student = Student::where('no_ic', $request->id)
                ->first();

            if(!$student){
                return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashWarning("Data Pelajar tidak wujud!");
            }

            if(is_null($student->class_id)){
                return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashWarning("Pelajar tidak mempunyai kelas!");
            }

            $uHasClass = UserHasClass::where('class_id', $student->class_id)
                ->where('user_id', auth()->user()->id)
                ->where('year', date('Y'))
                ->first();

            if(!$uHasClass){
                return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashWarning("Maaf! Hanya guru kelas dibenarkan!");
            }

            $classroom = Classroom::find($student->class_id);

            $today = UserGenerateAttendance::whereDate('created_at', '=', date('Y-m-d'))
                ->where('class_id', $classroom->id)
                ->first();


            if(!$today){
                $today = new UserGenerateAttendance();
                $today->class_id = $classroom->id;
                $today->user_id = auth()->user()->id;

                if(!$today->save()){
                    dd("Failed to save user generate att");
                }

                $students = StudentHasClass::where('class_id', $classroom->id)
                    ->where('year', date('Y'))
                    ->get();

                foreach ($students as $s){


                    //prevent from duplicate enrty
                    StudentAttendance::updateOrCreate(
                        ['uga_id' => $today->id, 'student_id' => $s->id],
                        [
                            'status' => 1,
                            'temperature' => null,
                            'remark' => null,
                        ]
                    );
                }
            }

            $todayAtt = StudentAttendance::where('uga_id', $today->id)
                ->where('student_id', $student->id)
                ->first();

            if($todayAtt->status == 2){
                return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashInfo("Kehadiran ".$student->name." telah diambil!");
            }


            return view('frontend.user.kehadiran.ct.scan-check', compact('student'));

        }else{

            return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashWarning("QR Tidak Sah!");
        }

//        return redirect()->route('frontend.user.kehadiran.ct.scan-complete', 1)->withFlashSuccess("Kehadiran AMAR MAKRUF berjaya dimasukkan.");
    }

    public function scanInsert(Request $request, $student_id){

        $student = Student::where('id', $student_id)
            ->first();
        
        if(!$student){
            return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashWarning("Data Pelajar tidak wujud!");
        }

        if(is_null($student->class_id)){
            return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashWarning("Pelajar tidak mempunyai kelas!");
        }

        dd($student->currentClass);

        $today = UserGenerateAttendance::whereDate('created_at', '=', date('Y-m-d'))
            ->where('class_id', $student->currentClass->class_id)
            ->first();

        //prevent from duplicate enrty
        $update = StudentAttendance::updateOrCreate(
            ['uga_id' => $today->id, 'student_id' => $student_id],
            [
                'status' => 2,
                'temperature' => $request->temperature,
                'remark' => null,
            ]
        );

        return redirect()->route('frontend.user.kehadiran.ct.scan')->withFlashSuccess("Kehadiran ".$student->name." berjaya dimasukkan.");
    }

    public function scanComplete($student_id){
        return view('frontend.user.kehadiran.ct.scan-complete');
    }


}
