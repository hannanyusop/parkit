<?php
namespace App\Export;

use App\Models\CvEvent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventExport implements FromView
{
    public function view(): View {

        return view('frontend.user.cv.excel.event', [
            'event' => CvEvent::find(request('id'))
        ]);
    }
}
