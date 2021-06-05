<?php
namespace App\Http\Controllers\Frontend\User\Kehadiran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Kehadiran\InsertRequest;
use App\Http\Requests\Frontend\User\Kehadiran\UpdateRequest;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\UgaAccess;
use App\Models\UserGenerateAttendance;
use App\Models\UserHasClass;
use Illuminate\Http\Request;

class KehadiaranController extends Controller{

    public function index(){

        $generated = UserGenerateAttendance::orderBy('created_at', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->get();

        return view('frontend.user.kehadiran.index', compact('generated'));

    }

    public function create(){

        $classes = Classroom::where('is_active', 1)
            ->orderBy('form', 'ASC')
            ->get();

        return view('frontend.user.kehadiran.create', compact('classes'));

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
        $generate->category = $request->category;
        $generate->start = $request->start;
        $generate->end = $request->end;
        $generate->is_checkout = ($request->has('is_checkout'))? 0 : 1;
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

    public function edit($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->findOrFail(decrypt($id));

        return view('frontend.user.kehadiran.edit', compact('uga'));
    }

    public function update(UpdateRequest $request, $id){

        $generate = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->findOrFail(decrypt($id));

        $generate->title = strtoupper($request->title);
        $generate->status = 1;
        $generate->category = $request->category;
        $generate->start = $request->start;
        $generate->end = $request->end;
        $generate->is_checkout = ($request->has('is_checkout'))? 0 : 1;
        $generate->type = $request->type;

        $generate->save();
        return redirect()->route('frontend.user.kehadiran.checkin', encrypt($generate->id))->withFlashSuccess('Event updated');


    }

    public function report($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail($id);

        $attend = $uga->attends->count();
        $total = $uga->attendances->count();
        $absent = $uga->absents->count();
        $checkouts = $uga->checkouts->count();

        $tag = json_decode($uga->tag, true);

        $attendance = StudentAttendance::where('uga_id', $uga->id)
            ->get();

        $attend_ids = $uga->attends->pluck('student_id');

        $attend_students = Student::whereIn('id', $attend_ids)->get();

        $collect_students = collect($attend_students);

        $short_bys = ['race', 'gender', 'nationality', 'religion', 'is_hostel'];

        $is_hostel = [0 => 'Daily Student', 1 => 'Hostel Student', '' => 'Daily Student'];
        $gender = ['M' => 'MALE', 'F' => 'FEMALE'];
        foreach ($short_bys as $groupBy){


            $grouped = $collect_students->groupBy($groupBy);
            $arr = [];
            $dataset = [];
            $labels = [];
            foreach ($grouped as $key => $d){
                $dataset[] = $d->count();

                if($groupBy == "is_hostel"){

                    $labels[]  = $is_hostel[$key];
                }elseif($groupBy == 'gender'){
                    $labels[] = $gender[$key];
                }else{
                    $labels[]  = $key;
                }

                $arr[$key] = $d->count();
            }

            $d = [
                'data' => $dataset,
                'backgroundColor' => [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                'label' => $groupBy
            ];

            $data[$groupBy] = [
                'labels' => $labels,
                'datasets' => [$d]
            ];
        }

        return view('frontend.user.kehadiran.report', compact('uga','attend', 'total', 'absent', 'checkouts', 'tag', 'data'));
    }

    public function delete($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->findOrFail(decrypt($id));

        StudentAttendance::where('uga_id', $uga->id)
            ->delete();

        $uga->delete();

        return redirect()->route('frontend.user.kehadiran.index')->withFlashSuccess(__('Attendance deleted'));
    }

    public function checkin($id){

        if(!session()->has('att_manual_tab')){

            session()->put('att_manual_tab', 'checkin');
        }

        $uga = UserGenerateAttendance::findOrFail(decrypt($id));

        $attend = $uga->attends->count();
        $total = $uga->attendances->count();
        $absent = $uga->absents->count();
        $checkouts = $uga->checkouts->count();

        $tag = json_decode($uga->tag, true);

        return view('frontend.user.kehadiran.checkin', compact('uga', 'attend', 'total', 'absent', 'checkouts', 'tag'));
    }

    public function checkinList(Request $request, $id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail(decrypt($id));

        if($request->status == 1){

            $attendances = StudentAttendance::where('uga_id', $uga->id)
                ->where('checkin', null)
                ->get();

        }elseif($request->status == 2){

            $attendances = StudentAttendance::where('uga_id', $uga->id)
                ->where('checkin', '!=', null)
                ->get();
        }elseif($uga->is_checkout == 1 && $request->status == 3){

            $attendances = StudentAttendance::where('uga_id', $uga->id)
                ->where('checkin', '!=', null)
                ->where('checkout', null)
                ->get();

        }else{

            $attendances = StudentAttendance::where('uga_id', $uga->id)
                ->get();
        }

        return view('frontend.user.kehadiran.checkin-list', compact('uga', 'attendances'));

    }

    public function checkinInsert(Request $request, $id){

        session()->put('att_manual_tab', 'checkin');

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail($id);

        $student = Student::where('no_ic', $request->ic)->first();

        if(!$student){
            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withErrors('MyKad Not exist');
        }

        $sa = StudentAttendance::where('uga_id', $uga->id)
            ->where('student_id', $student->id)
            ->first();

        if(!$sa){

            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withErrors('Student not in list');
        }

        if(!is_null($sa->checkin)){
            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withFlashWarning('Student already check-in');
        }

        $sa->update(['checkin' => now(), 'status' => 2]);
        return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withFlashSuccess('Student '.$sa->student->name.' successfully checked-in');

    }

    public function checkoutInsert(Request $request, $id){

        session()->put('att_manual_tab', 'checkout');

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail($id);

        if($uga->is_checkout == 0){

            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withErrors('This program does\'t have check-out module');
        }

        $student = Student::where('no_ic', $request->ic)->first();

        if(!$student){
            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withErrors('MyKad Not exist');
        }

        $sa = StudentAttendance::where('uga_id', $uga->id)
            ->where('student_id', $student->id)
            ->first();

        if(!$sa){

            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withErrors('Student not in list');
        }

        if(is_null($sa->checkin)){
            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withFlashWarning('Student need to checkin before can check-out');
        }

        if(!is_null($sa->checkout)){
            return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withFlashWarning('Student already check-out');
        }

        $sa->update(['checkout' => now(), 'status' => 2]);
        return redirect()->route('frontend.user.kehadiran.checkin', encrypt($id))->withFlashSuccess('Student '.$sa->student->name.' successfully check-out.');

    }

    public function checkinQr($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail(decrypt($id));

        if(!$uga){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Event not exist!');
        }

        return view('frontend.user.kehadiran.checkin-qr', compact('uga'));
    }

    public function checkinQrCheck(Request $request, $id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail(decrypt($id));

        if(!$uga){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Evenet not exist!');
        }


        if($request->has('id')){

            $student = Student::where('no_ic', $request->id)->first();

            if(!$student){
                return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('MyKad not exist.');
            }

            $sa = StudentAttendance::where('uga_id', $uga->id)
                ->where('student_id', $student->id)
                ->first();

            if(!$sa){

                return redirect()->route('frontend.user.kehadiran.checkin-qr', $id)->withErrors('Student not in list');
            }

            if(!is_null($sa->checkin)){
                return redirect()->route('frontend.user.kehadiran.checkin-qr', $id)->withFlashWarning('Student already check-in');
            }

            $sa->update(['checkin' => now(), 'status' => 2]);
            return redirect()->route('frontend.user.kehadiran.checkin-qr', $id)->withFlashSuccess('Student '.$sa->student->name.' successfully check-in.');

        }else{
            return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('Invalid parameter!');

        }

    }

    public function checkoutQr($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail(decrypt($id));

        if(!$uga){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Event not exist!');
        }

        if($uga->is_checkout == 0){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('This program does\'t have check-out module');
        }

        return view('frontend.user.kehadiran.checkout-qr', compact('uga'));
    }

    public function checkoutQrCheck(Request $request, $id){

        $uga = UserGenerateAttendance::find(decrypt($id));

        if(!$uga){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Program tidak wujud!');
        }

        if($uga->is_checkout == 0){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Jenis Kehadiran : Log masuk sahaja!');
        }

        if($request->has('id')){

            $student = Student::where('no_ic', $request->id)->first();

            if(!$student){
                return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('Nombor Kad Pengenalan pelajar tidak wujud.');
            }

            $sa = StudentAttendance::where('uga_id', $uga->id)
                ->where('student_id', $student->id)
                ->first();

            if(!$sa){

                return redirect()->route('frontend.user.kehadiran.checkout-qr', $id)->withErrors('Pelajar tiada dalam senarai.');
            }

            if(is_null($sa->checkin)){
                return redirect()->route('frontend.user.kehadiran.checkout-qr', $id)->withFlashWarning('Pelajar belum didaftar masuk.');
            }

            $sa->update(['checkout' => now(), 'status' => 2]);
            return redirect()->route('frontend.user.kehadiran.checkout-qr', $id)->withFlashSuccess('Berjaya daftar keluar pelajar '.$sa->student->name);

        }else{
            return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('Parameter tidak sah!');

        }

    }

    public function join($code){

        $generate = UserGenerateAttendance::where('code', $code)
            ->where('type', 1)
            ->first();

        if(!$generate){
            return redirect()->route('frontend.user.kehadiran.index')->withErrors('No event found for code : '. $code);
        }

        if($generate->user_id == auth()->user()->id){
            return redirect()->route('frontend.user.kehadiran.index')->withErrors(__('You are owner for this event'));
        }

        $check = UgaAccess::where('uga_id', $generate->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if($check){
            return redirect()->route('frontend.user.kehadiran.index')->withErrors(__('You already join this event.'));
        }

        $access = new UgaAccess();

        $access->uga_id = $generate->id;
        $access->user_id = auth()->user()->id;

        $access->save();
        return redirect()->route('frontend.user.kehadiran.index')->withFlashSuccess('Code accepted');

    }


}
