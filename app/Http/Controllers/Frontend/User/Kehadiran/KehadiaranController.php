<?php
namespace App\Http\Controllers\Frontend\User\Kehadiran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Kehadiran\InsertRequest;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\UserGenerateAttendance;
use App\Models\UserHasClass;
use Illuminate\Http\Request;

class KehadiaranController extends Controller{

    public function index(){

        $generated = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('frontend.user.kehadiran.index', compact('generated'));

    }

    public function create(){

        $classes = Classroom::where('is_active', 1)
            ->orderBy('form', 'ASC')
            ->get();

        $hostels = [
            '2' => 'SEMUA',
            '1' => 'ASRAMA SAHAJA',
            '0' => 'PELAJAR HARIAN'
        ];

        $genders = [
            'S' => 'SEMUA',
            'M' => 'LEKAKI SAHAJA',
            'F' => 'PEREMPUAN SAHAJA'
        ];

        return view('frontend.user.kehadiran.create', compact('classes', 'hostels', 'genders'));

    }

    public function insert(InsertRequest $request){


        $formAll = ($request->has('form'))? $request->form : [];
        $customClass = ($request->has('class'))? $request->class : [];

        $ids = [];
        foreach (formList() as $form => $forName){

            if(in_array($form, $formAll)){

                $formClassId = Classroom::where('form', $form)
                    ->pluck('id')->toArray();
            }else{

                $formClassId = (isset($customClass[$form]))? $customClass[$form] : [];

            }


            foreach ($formClassId as $id){

                $ids[] = (int)$id;
            }
        }

        $generate = new UserGenerateAttendance();

        $generate->user_id = auth()->user()->id;
        $generate->title = strtoupper($request->title);
        $generate->status = 1;
        $generate->tag = "";
        $generate->start = $request->start;
        $generate->end = $request->end;
        $generate->is_checkout = ($request->has('is_checkout'))? 1 : 0;
        $generate->type = $request->type;
        $generate->code = kehadiranCodeGenerator();

        $generate->save();

        $class_id = $ids;

        $tag['kelas'] = $class_id;
        $tag['jantina'] = 'Lelaki & Perempuan';
        $tag['status pelajar'] = 'Semua';

       $query = Student::where('status', 1)
           ->whereIn('class_id', $class_id);

       if($request->gender == 'M'){

           $query->where('gender', 'M');
           $tag['jantina'] = 'Lelaki Sahaja';

       }elseif($request->gender == 'F'){

           $query->where('gender', 'F');
           $tag['jantina'] = 'Perempuan Sahaja';

       }

       if($request->hostel == 0){
           #harian
           $query->where('is_hostel', 0);
           $tag['status pelajar'] = "Harian Sahaja";
       }elseif($request->hostel == 1){
           #asrama
           $query->where('is_hostel', 1);
           $tag['status pelajar'] = "Asrama Sahaja";
       }

        $generate->update(['tag' => json_encode($tag)]);
        $students = $query->get();

        $failed = 0;
       foreach ($students as $student){

           $attendance = new StudentAttendance();
           $attendance->uga_id = $generate->id;
           $attendance->student_id = $student->id;
           $attendance->status = 1;

           if(!$attendance->save()){
               $failed++;
           }
       }

       if($failed > 0){
           return redirect()->route('frontend.user.kehadiran.index')->withFlashWarning('Kehadiran berjaya dijana.Data rosak:'.$failed);
       }else{
           return redirect()->route('frontend.user.kehadiran.index')->withFlashSuccess('Kehadiran berjaya dijana');
       }

    }

    public function checkin($id){

        $uga = UserGenerateAttendance::findOrFail($id);

        return view('frontend.user.kehadiran.checkin', compact('uga'));
    }

    public function checkinInsert(Request $request, $id){

        $uga = UserGenerateAttendance::findOrFail($id);

        $student = Student::where('no_ic', $request->ic)->first();

        if(!$student){
            return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('Nombor Kad Pengenalan pelajar tidak wujud.');
        }

        $sa = StudentAttendance::where('uga_id', $uga->id)
            ->where('student_id', $student->id)
            ->first();

        if(!$sa){

            return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('Pelajar tiada dalam senarai.');
        }

        if(!is_null($sa->checkin)){
            return redirect()->route('frontend.user.kehadiran.checkin', $id)->withFlashWarning('Pelajar sudah didaftar masuk.');
        }

        $sa->update(['checkin' => now(), 'status' => 2]);
        return redirect()->route('frontend.user.kehadiran.checkin', $id)->withFlashSuccess('Pelajar '.$sa->student->name.' berjaya didaftar masuk.');

    }


}
