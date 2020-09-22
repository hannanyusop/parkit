<?php

namespace App\Http\Controllers\Frontend\User\Library;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\Booking\BookingCheckRequest;
use App\Http\Requests\Frontend\User\Library\Booking\CreateBookingRequest;
use App\Models\Library\Booking;
use Illuminate\Http\Request;
use Mail;

class BookingController extends Controller{

    public function index(){

        $bookings = Booking::where('staff_id', auth()->user()->id)
            ->whereYear('date', date('Y'))
            ->orderBy('status', 'ASC')
            ->get();

        return view('frontend.user.library.admin.booking.index', compact('bookings'));
    }

    public function create(BookingCheckRequest $request){

        $date = null;
        $bookings = null;
        if($request->has('date')){
            $date = $request->date;

            $year = reformatDatetime($request->date, 'Y');

            if($year != date('Y')){
                return redirect()->back()->withErrors('Sila pilih tarikh dalam tahun ini sahaja.');
            }


            $bookings = Booking::whereDate('date', $request->date)
                ->get();
        }

        return view('frontend.user.library.admin.booking.create', compact('date', 'bookings'));
    }

    public function insert(CreateBookingRequest $request){


        $start = reformatDatetime($request->start, 'H:i:s');
        $end = reformatDatetime($request->end, 'H:i:s');

        $check = Booking::where('start', '>=', $start)
            ->where('end', '<=', $end)
            ->first();

        if($check){
            return redirect()->back()->withErrors('Slot tidak tersedia. Sila pilih masa/tarikh lain.');

        }
        $booking = new Booking();
        $booking->admin_id = 0;
        $booking->staff_id = auth()->user()->id;
        $booking->status = 1; #pending
        $booking->date = $request->date;
        $booking->start = $start;
        $booking->end = $end;
        $booking->purpose = $request->purpose;
        $booking->staff_notes = $request->notes;

        $staff_name = auth()->user()->name;
        $purpose = $request->purpose;
        $date = $request->date;

        $booking->save();

        $lib_admin = User::permission('lib_admin')->get();
        foreach ($lib_admin as $admin){

            try{

                Mail::send('mail.library.booking-create', compact('staff_name', 'purpose', 'date', 'start', 'end'), function($message) use ($admin) {
                    $message->to($admin->email, $admin->name)->subject('PERMOHONAN TEMPAHAN SLOT PERPUSTAKAAN');
                    $message->from('noreply@smkal.my','NO-REPLY SMS SMKAL');
                });

            }catch (\Exception $e){

                return redirect()->route('frontend.user.library.admin.booking.index')->withFlashSuccess('Tempahan berjaya dibuat. SMTP not configure properly.');
            }
        }

        return redirect()->route('frontend.user.library.admin.booking.index')->withFlashSuccess('Tempahan berjaya dibuat.');

    }

    public function delete($id){

        $booking = Booking::where('staff_id', auth()->user()->id)
            ->findOrFail($id);

        $booking->delete();

        return redirect()->back()->withFlashSuccess('Tempahan Berjaya dipadam');

    }

    public function applicantList(){

        $bookings = Booking::whereYear('date', date('Y'))
            ->orderBy('status', 'ASC')
            ->orderBy('date', 'DESC')
            ->get();

        $events = array();
        foreach ($bookings as $booking){

            if($booking->status == 1 || $booking->status == 2){

                $data = [
                    'title' => $booking->purpose."(PIC:".$booking->applicant->name.")",
                    'start' => $booking->date." ".$booking->start,
                    'end' => $booking->date." ".$booking->end,
                    'backgroundColor' => ($booking->status == 2)? "#3f39f8" : "#000",
                    'textColor' => "#FFFF"
                ];

                array_push($events, $data);
            }
        }

        return view('frontend.user.library.admin.booking.applicant-list', compact('bookings','events'));
    }

    public function action($id, $status){

        $booking = Booking::whereYear('date', date('Y'))
            ->findOrFail($id);

        $pending = array(2, 3);

        if($booking->status == 1 && in_array($status, $pending)){

            $str = ($status == 2)? "DITERIMA" : "DITOLAK";
            $booking->status = $status;
            $booking->admin_id = auth()->user()->id;
            $booking->save();

            $applicant = $booking->applicant;
            $staff_name = $applicant->name;
            $purpose = $booking->purpose;
            $date = $booking->date;
            $start = $booking->start;
            $end = $booking->end;


            try{

                Mail::send('mail.library.booking-reply', compact('staff_name', 'purpose', 'date', 'start', 'end', 'str'), function($message) use ($applicant) {
                    $message->to($applicant->email, $applicant->name)->subject('PERMOHONAN TEMPAHAN SLOT PERPUSTAKAAN');
                    $message->from('noreply@smkal.my','NO-REPLY SMS SMKAL');
                });

            }catch (\Exception $e){

                return redirect()->route('frontend.user.library.admin.booking.index')->withFlashSuccess('Tempahan berjaya dibuat. SMTP not configure properly.');
            }

            return redirect()->back()->withFlashSuccess('Tempahan berjaya '.$str);

        }else if($booking->status == 2 || $booking->status == 3){
            $booking->status = 1;
            $booking->save();
            return redirect()->back()->withFlashSuccess('Tempahan berjaya di reset.');
        }else{
            return redirect()->back()->withErrors('Status tidak tepat.');

        }
    }
}
