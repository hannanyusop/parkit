<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library\Book;
use App\Models\Library\Borrow;
use App\Models\Library\Log;
use App\Models\Library\LogStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function monthlyBorrow(Request $request){

        if(!isset($request->month)){
            return redirect()->route('frontend.user.library.admin.report.student-top-borrower-monthly', ['month' => date('m')]);
        }

        $year = date('Y');
        $month = $request->month;

        $topBorrower = Borrow::select(DB::raw('count(*) as total'), 'student_id')
            ->groupBy('student_id')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('total', 'DESC')
            ->limit(30)
            ->get();

        return view('frontend.user.library.admin.report.student-top-borrower-monthly', compact('topBorrower'));

    }

    public function yearlyBorrow(Request $request){

        if(!isset($request->year)){
            return redirect()->route('frontend.user.library.admin.report.student-top-borrower-yearly', ['year' => date('Y')]);
        }

        $year = $request->year;

        $topBorrower = Borrow::select(DB::raw('count(*) as total'), 'student_id')
            ->groupBy('student_id')
            ->whereYear('created_at', $year)
            ->orderBy('total', 'DESC')
            ->limit(30)
            ->get();

        return view('frontend.user.library.admin.report.student-top-borrower-yearly', compact('topBorrower'));

    }

    public function staffMonthlyVisit(Request $request){

        if(!isset($request->month)){
            return redirect()->route('frontend.user.library.admin.report.staff-monthly-visit', ['month' => date('m')]);
        }

        $year = date('Y');
        $month = $request->month;

        $data = LogStaff::select(DB::raw('count(*) as total'), 'user_id')
            ->groupBy('user_id')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('total', 'DESC')
            ->limit(30)
            ->get();

        return view('frontend.user.library.admin.report.staff-monthly-visit', compact('data'));

    }

    public function staffYearlyVisit(Request $request){

        if(!isset($request->year)){
            return redirect()->route('frontend.user.library.admin.report.staff-yearly-visit', ['year' => date('Y')]);
        }

        $year = $request->year;

        $data = LogStaff::select(DB::raw('count(*) as total'), 'user_id')
            ->groupBy('user_id')
            ->whereYear('created_at', $year)
            ->orderBy('total', 'DESC')
            ->limit(30)
            ->get();

        return view('frontend.user.library.admin.report.staff-yearly-visit', compact('data'));

    }

    public function studentMonthlyVisit(Request $request){

        if(!isset($request->month)){
            return redirect()->route('frontend.user.library.admin.report.student-monthly-visit', ['month' => date('m')]);
        }

        $year = date('Y');
        $month = $request->month;

        $data = Log::select(DB::raw('count(*) as total'), 'student_id')
            ->groupBy('student_id')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('total', 'DESC')
            ->limit(30)
            ->get();

        return view('frontend.user.library.admin.report.student-monthly-visit', compact('data'));

    }

    public function studentYearlyVisit(Request $request){

        if(!isset($request->year)){
            return redirect()->route('frontend.user.library.admin.report.student-yearly-visit', ['year' => date('Y')]);
        }

        $year = $request->year;

        $data = Log::select(DB::raw('count(*) as total'), 'student_id')
            ->groupBy('student_id')
            ->whereYear('created_at', $year)
            ->orderBy('total', 'DESC')
            ->limit(30)
            ->get();

        return view('frontend.user.library.admin.report.student-yearly-visit', compact('data'));

    }



}
