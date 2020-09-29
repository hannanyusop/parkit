<?php

namespace App\Http\Controllers\Frontend\User\Portal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Portal\Announcement\InsertRequest;
use App\Http\Requests\Frontend\User\Portal\Announcement\UpdateRequest;
use App\Models\Portal\PortalAnnouncement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller{

    public function index(Request $request){

        if($request->has('title')){

            $announcements = PortalAnnouncement::where('title', 'LIKE', "%$request->title%")
                ->orderBy("created_at", "DESC")
                ->paginate(20);
        }else{

            $announcements = PortalAnnouncement::orderBy("created_at", "DESC")
                ->paginate(20);
        }

        return view('frontend.user.portal.announcement.index', compact('announcements'));
    }

    public function create(){

        return view('frontend.user.portal.announcement.create');
    }

    public function insert(InsertRequest $request){

        $announcement = new PortalAnnouncement();

        $announcement->title = $request->title;
        $announcement->group = $request->group;
        $announcement->text = $request->text;
        $announcement->is_show = ($request->has('is_show'))? 1 : 0;
        $announcement->show_until = $request->show_until;
        $announcement->date = $request->date;

        $announcement->save();

        return redirect()->route('frontend.user.portal.announcement.index')->withFlashSuccess('Pengumuman berjaya dibuat');


    }

    public function view($id){

        $announcement = PortalAnnouncement::findOrFail($id);
        return view('frontend.user.portal.announcement.view', compact('announcement'));
    }

    public function edit($id){

        $announcement = PortalAnnouncement::findOrFail($id);
        return view('frontend.user.portal.announcement.edit', compact('announcement'));

    }

    public function update(UpdateRequest $request, $id){

        $announcement = PortalAnnouncement::findOrFail($id);

        $announcement->title = $request->title;
        $announcement->group = $request->group;
        $announcement->text = $request->text;
        $announcement->is_show = ($request->has('is_show'))? 1 : 0;
        $announcement->show_until = $request->show_until;
        $announcement->date = $request->date;


        $announcement->save();

        return redirect()->route('frontend.user.portal.announcement.index')->withFlashSuccess('Pengumuman berjaya dikemaskini');
    }

    public function delete($id){

        $announcement = PortalAnnouncement::findOrFail($id);

        $announcement->delete();
        return redirect()->route('frontend.user.portal.announcement.index')->withFlashSuccess('Pengumuman berjaya dipadam');

    }

}
