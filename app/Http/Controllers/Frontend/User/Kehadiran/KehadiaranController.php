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

        $generated = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
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

        $uga = UserGenerateAttendance::findOrFail(decrypt($id));

        return view('frontend.user.kehadiran.edit', compact('uga'));
    }

    public function update(UpdateRequest $request, $id){

        $generate = UserGenerateAttendance::findOrFail(decrypt($id));

        $generate->title = strtoupper($request->title);
        $generate->status = 1;
        $generate->start = $request->start;
        $generate->end = $request->end;
        $generate->is_checkout = ($request->has('is_checkout'))? 0 : 1;
        $generate->type = $request->type;

        $generate->save();
        return redirect()->route('frontend.user.kehadiran.checkin', encrypt($generate->id))->withFlashSuccess('Kehadiran berjaya dikemaskini');


    }

    public function delete($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->findOrFail(decrypt($id));

        $attendance = StudentAttendance::where('uga_id', $uga->id)
            ->delete();

        $uga->delete();

        return redirect()->route('frontend.user.kehadiran.index')->withFlashSuccess('Kehadiran berjaya dapadam');
    }

    public function checkin($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail(decrypt($id));

        return view('frontend.user.kehadiran.checkin', compact('uga'));
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

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->findOrFail($id);

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

    public function checkinQr($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->find(decrypt($id));

        if(!$uga){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Program tidak wujud!');
        }

        return view('frontend.user.kehadiran.checkin-qr', compact('uga'));
    }

    public function checkinQrCheck(Request $request, $id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->find(decrypt($id));

        if(!$uga){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Program tidak wujud!');
        }


        if($request->has('id')){

            $student = Student::where('no_ic', $request->id)->first();

//            dd($student);

            if(!$student){
                return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('Nombor Kad Pengenalan pelajar tidak wujud.');
            }

            $sa = StudentAttendance::where('uga_id', $uga->id)
                ->where('student_id', $student->id)
                ->first();

            if(!$sa){

                return redirect()->route('frontend.user.kehadiran.checkin-qr', $id)->withErrors('Pelajar tiada dalam senarai.');
            }

            if(!is_null($sa->checkin)){
                return redirect()->route('frontend.user.kehadiran.checkin-qr', $id)->withFlashWarning('Pelajar sudah didaftar masuk.');
            }

            $sa->update(['checkin' => now(), 'status' => 2]);
            return redirect()->route('frontend.user.kehadiran.checkin-qr', $id)->withFlashSuccess('Pelajar '.$sa->student->name.' berjaya didaftar masuk.');

        }else{
            return redirect()->route('frontend.user.kehadiran.checkin', $id)->withErrors('Parameter tidak sah!');

        }

    }

    public function checkoutQr($id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->find(decrypt($id));

        if(!$uga){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Program tidak wujud!');
        }

        if($uga->is_checkout == 0){
            return  redirect()->route('frontend.user.kehadiran.index')->withErrors('Jenis Kehadiran : Log masuk sahaja!');
        }

        return view('frontend.user.kehadiran.checkout-qr', compact('uga'));
    }

    public function checkoutQrCheck(Request $request, $id){

        $uga = UserGenerateAttendance::where('user_id', auth()->user()->id)
            ->orWhereIn('id', getUgaAccess())
            ->find(decrypt($id));

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
            return redirect()->route('frontend.user.kehadiran.index')->withErrors('Tiada senarai kehadiran dijumapai');
        }

        $access = new UgaAccess();

        $access->uga_id = $generate->id;
        $access->user_id = auth()->user()->id;

        $access->save();
        return redirect()->route('frontend.user.kehadiran.index')->withFlashSuccess('Kod diterima.');

    }


}
