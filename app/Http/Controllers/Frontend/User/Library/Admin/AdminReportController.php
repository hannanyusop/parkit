<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library\Book;
use App\Models\Library\Borrow;
use App\Models\Library\Log;
use Illuminate\Http\Request;

class AdminReportController extends Controller{

    public function index(Request $request){

        if(!isset($request->month)){
            return redirect()->route('frontend.user.library.admin.report.index', ['month' => date('m')]);
        }

        $year = date('Y');
        $month = $request->month;

        $d = new \DateTime( "$year-$month-01" );
        $last_day =  $d->format( 't' );
        $start_day = 1;

        $visitors = array();
        $borrows = array();
        $days = array();

        do{

            $date = $year."-".$month."-".$start_day;

            $v = Log::whereDate('created_at', $date)
                ->count();

            array_push($visitors, $v);

            $b = Borrow::whereDate('created_at', $date)
                ->count();

            array_push($borrows, $b);

            array_push($days, $start_day);

            $start_day++;
        }while($start_day <= $last_day);

        return view('frontend.user.library.admin.report.index', compact('borrows', 'visitors', 'days'));

    }

    public function monthly(Request $request){


        if(!isset($request->year)){
            return redirect()->route('frontend.user.library.admin.report.monthly', ['year' => date('Y')]);
        }

        $month = 1;
        $visitors = array();
        $borrows = array();
        do{

            $v = Log::whereYear('created_at', $request->year)
                ->whereMonth('created_at', $month)
                ->count();

            array_push($visitors, $v);

            $b = Borrow::whereYear('created_at', $request->year)
                ->whereMonth('created_at', $month)
                ->count();

            array_push($borrows, $b);

            $month++;

        }while($month <= 12);


        return view('frontend.user.library.admin.report.monthly', compact('borrows', 'visitors'));

    }

}
