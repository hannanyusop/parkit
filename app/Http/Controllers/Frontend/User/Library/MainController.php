<?php
namespace App\Http\Controllers\Frontend\User\Library;

use App\Http\Controllers\Controller;
use App\Models\Library\Book;
use App\Models\Library\Booking;
use Illuminate\Http\Request;

class MainController extends Controller{

    public function index(){

        $bookings = Booking::whereDate('date', today())
            ->where('status', 2)
            ->get();

        return view('frontend.user.library.index', compact('bookings'));
    }

    public function prefectLogin(){

        return view('frontend.user.library.prefect-login');
    }

    public function prefectLoginCheck(Request $request){

        $no_ic = $request->no_ic;

        $json = getLibraryOption('prefect_list', '[]');
        $prefects = json_decode($json, true);

        if($prefects[$no_ic]){

            $data = [
                'name' => $prefects[$no_ic],
                'no_ic' => $no_ic
            ];
            \Session::put(['prefect' => $data]);

            return redirect()->route('frontend.user.library.index')->withFlashSuccess('Selamat datang '.$prefects[$no_ic]."");

        }else{
            return redirect()->route('frontend.user.library.prefect-login')->withFlashWarning('Nombor kad pengenalan tidak wujud!');
        }
    }

    public function prefectLogout(){


        \Session::forget('prefect');
        return redirect()->route('frontend.user.library.prefect-login')->withFlashSuccess('Berjaya log keluar.');

    }

}
