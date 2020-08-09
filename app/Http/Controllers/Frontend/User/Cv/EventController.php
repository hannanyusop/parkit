<?php

namespace App\Http\Controllers\Frontend\User\Cv;

use App\Export\EventExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Cv\CheckinRequest;
use App\Models\CvEvent;
use App\Models\CvLog;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller{

    public function index(){

        $events = CvEvent::get();

        return view('frontend.user.cv.event.index', compact('events'));
    }

    public function view($id){
        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        return view('frontend.user.cv.event.view', compact('event'));
    }

    public function export($id){

        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        return Excel::download(new EventExport, 'CV19-'.$event->name.reformatDatetime($event->created_at,'d M Y').'.xlsx');
    }

    public function add(){

        return view('frontend.user.cv.event.add');
    }

    public function insert(Request $request){

        $event = new CvEvent();

        $event->name = strtoupper($request->name);
        $event->token = eventTokenGenerator(); #TODO: refresh token every 30 seconds
        $event->manual_token  = eventManualTokenGenerator(); #will change every time used it
        $event->static_token = eventStaticTokenGenerator();
        $event->status = 1; #active

        if($event->save()){
            return redirect()->route('frontend.user.cv.event.index')->withFlashSuccess("New Event created!");
        }else{
            return redirect()->route('frontend.user.cv.event.add')->withErrors("Failed to create event!");
        }
    }

    public function edit($id){

        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        return view('frontend.user.cv.event.edit', compact('event'));
    }

    public function update(Request $request, $id){

        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        $event->name = strtoupper($request->name);

        if($event->save()){
            return redirect()->route('frontend.user.cv.event.index')->withFlashSuccess("Event updated!");
        }else{
            return redirect()->route('frontend.user.cv.event.edit', $id)->withErrors("Failed to update event!");
        }
    }

    public function activate($id){

        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        if($event->status == 1){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Event already activated!");
        }

        $event->status = 1;

        if($event->save()){
            return redirect()->route('frontend.user.cv.event.index')->withFlashSuccess("Event activated!");
        }else{
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Failed to activate event!");
        }
    }

    public function deactivate($id){

        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        if($event->status == 2){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Event already deactivate!");
        }

        $event->status = 2;

        if($event->save()){
            return redirect()->route('frontend.user.cv.event.index')->withFlashSuccess("Event deactivate!");
        }else{
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Failed to deactivate event!");
        }
    }

    public function regenerate($id){

        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        if($event->status == 2){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Cannot regenerate inactive event!");
        }

        $event->token = eventTokenGenerator();

        if($event->save()){
            return redirect()->route('frontend.user.cv.event.index')->withFlashSuccess("Token changed!");
        }else{
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Failed to change event\'s token!");
        }
    }

    public function landing($id){

        $event = CvEvent::find($id);

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid event!");
        }

        if($event->status == 2){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Inactive event!");
        }

        return view('frontend.user.cv.event.landing', compact('event'));

    }

    public function checkin($token){

        #check
        $event = CvEvent::where('token', $token)->first();

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid QR Code!");
        }

        if($event->status == 2){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Cannot check-in on inactive event!");
        }

        #check user
        $cv_logs = CvLog::where('event_id', $event->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        #already checkin
        if($cv_logs){
            return view('frontend.user.cv.event.checkin-done', compact('event', 'cv_logs'))->withFlashInfo("Already checkin!");
        }

        return view('frontend.user.cv.event.checkin', compact('event'));


    }

    public function checkinNew(CheckinRequest $request, $token){

        #check
        $event = CvEvent::where('token', $token)->first();

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid QR Code!");
        }

        if($event->status == 2){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Cannot check-in on inactive event!");
        }

        #check user
        $cv_logs = CvLog::where('event_id', $event->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        #already checkin
        if($cv_logs){

            $cv_logs->temperature = $request->temperature;
            $cv_logs->save();
            return redirect()->route('frontend.user.cv.event.checkin-done', $event->id)->withFlashWarning("You already entered this event!");
        }

        $new = new CvLog();
        $new->user_id = auth()->user()->id;
        $new->event_id = $event->id;
        $new->temperature = $request->temperature;

        if($new->save()){
            return redirect()->route('frontend.user.cv.event.checkin-done', $event->id)->withFlashSuccess("Thank you!");
        }else{
            return redirect()->route('frontend.user.cv.event.checkin', $event->token)->withErrors("Failed to checkin!Please try again or ask the guard to insert manually.");
        }



    }

    public function checkinUpdate(CheckinRequest $request, $token){

        #check
        $event = CvEvent::where('token', $token)->first();

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid QR Code!");
        }

        if($event->status == 2){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Cannot checkin on inactive event!");
        }

        #check user
        $cv_logs = CvLog::where('event_id', $event->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        #already checkin
        if(!$cv_logs){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Ops! You haven\'t checkin into this event!");
        }

        $cv_logs->temperature = $request->temperature;

        if($cv_logs->save()){
            return redirect()->route('frontend.user.cv.event.checkin-done', $event->token)->withFlashSuccess("Thank you! Temperature updated!");
        }else{
            return redirect()->route('frontend.user.cv.event.checkin-update', $event->token)->withErrors("Failed to checkin!Please try again or ask the guard to update manually.");
        }



    }

    public function checkinDone($id){

        #check
        $event = CvEvent::where('id', $id)->first();

        if(!$event){
            return redirect()->route('frontend.user.cv.event.index')->withErrors("Invalid Event!");
        }

        #check user
        $cv_logs = CvLog::where('event_id', $event->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if(!$cv_logs){
            return redirect()->route('frontend.user.cv.event.index')->withFlashWarning("Ops! You haven\'t checkin into this event!");
        }

        return view('frontend.user.cv.event.checkin-done', compact('event', 'cv_logs'));
    }

    public function checkLast(Request $request, $id){

        if($request->ajax()){

            $log = CvLog::where('event_id', $id)
                ->orderBy('created_at', 'DESC')
                ->first();

            $event = CvEvent::find($id);

            $data = array(
                'last_user_id'  => ($log)? $log->user_id : 0,
                'name' => ($log)? $log->user->name : "",
                'total' =>  CvLog::where('event_id', $id)->count(),
                'manual_token' => $event->manual_token,

        );
            echo json_encode($data);
        }
    }

    #all user

    public function history(){

        $logs = CvLog::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->limit(20)->get();
        return view('frontend.user.cv.event.history', compact('logs'));

    }

    public function checkinScan(){
        return view('frontend.user.cv.event.checkin-scan2');
    }

    public function checkinManual(Request $request){

        $event = null;

        if($request->has('code')){

            $event = CvEvent::where('manual_token', $request->code)
                ->where('status', 1)
                ->first();
        }

        return view('frontend.user.cv.event.checkin-manual', compact('event'));

    }

    public function checkinManualInsert(CheckinRequest $request){

        $event = CvEvent::where('manual_token', $request->token)->first();

        if(!$event){
            return redirect()->route('frontend.user.cv.event.checkin-manual')->withFlashWarning('Invalid code! Please get the code from the guard.');
        }

        #check user
        $cv_logs = CvLog::where('event_id', $event->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        #already checkin
        if($cv_logs){

            $event->update(['manual_token' => eventManualTokenGenerator()]);

            $cv_logs->temperature = $request->temperature;
            $cv_logs->save();
            return redirect()->route('frontend.user.cv.event.checkin-done', $event->id)->withFlashWarning("You already entered this event!");
        }

        $log = new CvLog();
        $log->user_id = auth()->user()->id;
        $log->event_id = $event->id;
        $log->temperature = $request->temperature;

        $event->update(['manual_token' => eventManualTokenGenerator()]);

        if($log->save()){
            return redirect()->route('frontend.user.cv.event.checkin-done', $event->id )->withFlashSuccess('Manual check-in successful!');
        }else{
            return redirect()->route('frontend.user.cv.event.checkin-manual')->withErrors('Manual check-in failed!');
        }

    }

}
