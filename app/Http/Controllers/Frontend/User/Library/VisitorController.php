<?php
namespace App\Http\Controllers\Frontend\User\Library;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\Visitor\CheckRequest;
use App\Models\Library\Book;
use App\Models\Library\Log;
use App\Models\Library\LogStaff;
use App\Models\Student;
use Carbon\Carbon;

class VisitorController extends Controller{

    public function today(){

        $logStudent = Log::whereRaw('Date(created_at) = CURDATE()')
            ->orderBy('checkout', "ASC")
            ->get();

        $logStaff = LogStaff::whereRaw('Date(created_at) = CURDATE()')
            ->orderBy('checkout', "ASC")
            ->get();

        return view('frontend.user.library.visitor.today', compact('logStaff', 'logStudent'));

    }

    public function check(CheckRequest $request){


        if($request->has('is_staff')){

            $user = User::where('unique_id',$request->no_ic)
                ->first();

            if(!$user){
                return redirect()->route('frontend.user.library.visitor.today')->withFlashWarning('Maklumat staff tidak dijumpai!');
            }

            $log = LogStaff::whereRaw('Date(created_at) = CURDATE()')
                ->where('user_id', $user->id)
                ->orderBy('id', "DESC")
                ->first();

            if($log){
                #checkout user

                if(!is_null($log->checkout)){
                    #dah checkout

                    $after1hour = Carbon::now()->addHour();

                    if($after1hour < $log->checkout){

                        #create new log

                        $newLog = new LogStaff();
                        $newLog->user_id = $user->id;
                        $newLog->checkin = Carbon::now();

                        $newLog->save();

                        return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log masuk staff :'.$user->name);

                    }else{

                        #just empty checkout
                        $log->checkout = null;
                        $log->save();

                        return redirect()->route('frontend.user.library.visitor.today')->withFlashInfo('Berjaya Log masuk semula staff :'.$user->name);
                    }

                }else{

                    $log->checkout = Carbon::now();
                    $log->save();

                    return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log keluar staff :'.$user->name);

                }

            }

            $newLog = new LogStaff();
            $newLog->user_id = $user->id;
            $newLog->checkin = Carbon::now();

            $newLog->save();

            return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log masuk staff :'.$user->name);


        }else{
            #student

            $student = Student::where('no_ic', $request->no_ic)->first();

            if(!$student){
                return redirect()->route('frontend.user.library.visitor.today')->withFlashWarning('Maklumat pelajar tidak dijumpai!');
            }

            $log = Log::whereRaw('Date(created_at) = CURDATE()')
                ->where('student_id', $student->id)
                ->orderBy('id', "DESC")
                ->first();


            if($log){
                #checkout user

                if(!is_null($log->checkout)){
                    #dah checkout

                    $after1hour = Carbon::now()->addHour();

                    if($after1hour < $log->checkout){

                        #create new log

                        $newLog = new Log();
                        $newLog->student_id = $student->id;
                        $newLog->checkin = Carbon::now();

                        $newLog->save();

                        return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log masuk pelajar :'.$student->name);

                    }else{

                        #just empty checkout
                        $log->checkout = null;
                        $log->save();

                        return redirect()->route('frontend.user.library.visitor.today')->withFlashInfo('Berjaya Log masuk semula pelajar :'.$student->name);
                    }

                }else{

                    $log->checkout = Carbon::now();
                    $log->save();

                    return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log keluar pelajar :'.$student->name);

                }

            }

            $newLog = new Log();
            $newLog->student_id = $student->id;
            $newLog->checkin = Carbon::now();

            $newLog->save();

            return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log masuk pelajar :'.$student->name);

        }

    }

    public function manualCheckout($no_ic, $staff = false){


        if($staff){

            $user = User::where('unique_id', $no_ic)->first();


            if(!$user){
                return redirect()->route('frontend.user.library.visitor.today')->withFlashError('Nombor Kad Pengenalan :'.$no_ic.' tidak wujud!');
            }

            $log = LogStaff::whereRaw('Date(created_at) = CURDATE()')
                ->where('user_id', $user->id)
                ->orderBy('id', "DESC")
                ->first();

            if($log) {
                #checkout user

                if (is_null($log->checkout)) {

                    $log->checkout = Carbon::now();
                    $log->save();

                    return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log keluar staff :' . $user->name);

                } else {
                    return redirect()->route('frontend.user.library.visitor.today')->withFlashWarning('Staff ' . $user->name . 'telah log keluar pada' . reformatDatetime($log->checkout, "h:i A"));
                }

            }else{
                return redirect()->route('frontend.user.library.visitor.today')->withFlashError('Tiada rekod dijumpai');

            }

        }else{
            $student = Student::where('no_ic', $no_ic)->first();

            if(!$student){
                return redirect()->route('frontend.user.library.visitor.today')->withFlashError('Nombor Kad Pengenalan :'.$no_ic.' tidak wujud!');
            }

            $log = Log::whereRaw('Date(created_at) = CURDATE()')
                ->where('student_id', $student->id)
                ->orderBy('id', "DESC")
                ->first();


            if($log) {
                #checkout user

                if (is_null($log->checkout)) {

                    $log->checkout = Carbon::now();
                    $log->save();

                    return redirect()->route('frontend.user.library.visitor.today')->withFlashSuccess('Berjaya Log keluar pelajar :' . $student->name);

                } else {
                    return redirect()->route('frontend.user.library.visitor.today')->withFlashWarning('Pelajar ' . $student->name . 'telah log keluar pada' . reformatDatetime($log->checkout, "h:i A"));
                }

            }else{
                return redirect()->route('frontend.user.library.visitor.today')->withFlashError('Tiada rekod dijumpai');

            }
        }
    }

}
