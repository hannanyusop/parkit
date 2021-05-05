<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\UserGenerateAttendance;
use Carbon\Carbon;


class DashboardController extends Controller{

    public function index(){

        $att = UserGenerateAttendance::get()->collect();

        $month = 1;

        $graph = [];
        do{

            $c = UserGenerateAttendance::whereMonth('created_at', $month)
                ->whereYear('created_at', date('Y'))
                ->count();

            $graph[] = $c;
            $month++;
        }while($month <= 12);

        $attendance = [
            'today' => $att->where('start', Carbon::today())->count(),
            'week' => $att->whereBetween('start', [Carbon::today(), Carbon::today()->addDays(7)])->count(),
            'month' => $att->whereBetween('start', [Carbon::parse(date('Y-m-1')), Carbon::parse(date('Y-m-t'))])->count(),
            'year' => $att->whereBetween('start', [Carbon::parse(date('Y-1-1')), Carbon::parse(date('Y-12-31'))])->count()
        ];

        $latest = UserGenerateAttendance::orderBy('created_at', 'DESC')->limit(5)->get();

        $count = [
            'staff' =>  $staff = User::where('type', 'user')->count(),
            'students' => Student::count(),
            'class' => Classroom::count(),
            'attendance' => UserGenerateAttendance::count()
        ];

        return view('backend.dashboard', compact('count', 'attendance', 'latest', 'graph'));
    }
}
