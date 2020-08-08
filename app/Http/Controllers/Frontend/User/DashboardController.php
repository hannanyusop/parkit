<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\CvEvent;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $active_ca_events = CvEvent::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();
        return view('frontend.user.dashboard', compact('active_ca_events'));
    }
}
