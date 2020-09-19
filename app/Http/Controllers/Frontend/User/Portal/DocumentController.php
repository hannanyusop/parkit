<?php

namespace App\Http\Controllers\Frontend\User\Portal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Portal\Document\InsertRequest;
use App\Http\Requests\Frontend\User\Portal\Document\UpdateRequest;
use App\Models\Portal\PortalDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller{

    public function index(Request $request){

        if($request->has('name') || $request->has('group')){

            $documents = PortalDownload::where('name', 'LIKE', "%$request->name%")
                ->where('group', 'LIKE', "%$request->group%")
                ->orderBy("created_at", "DESC")
                ->paginate(20);
        }else{

            $documents = PortalDownload::orderBy("created_at", "DESC")
                ->paginate(20);
        }

        return view('frontend.user.portal.document.index', compact('documents'));
    }

    public function create(){

        return view('frontend.user.portal.document.create');
    }

    public function insert(InsertRequest $request){

        $document = new PortalDownload();

        try {

            $fileName = time().'_'.$request->file->getClientOriginalName();
            $file = $request->file('file')->storeAs('document', $fileName, 'public');

            $document->file = $file;

        }catch (\Exception $e){
            return  redirect()->back()->withFlashError('Gagal memuatnaik dokumen');
        }

        $document->name = $request->name;
        $document->group = $request->group;
        $document->description = $request->description;
        $document->is_show = ($request->has('is_show'))? 1 : 0;

        $document->save();

        return redirect()->route('frontend.user.portal.document.index')->withFlashSuccess('Dokumen berjaya di muat naik');
    }

    public function view($id){

        $document = PortalDownload::findOrFail($id);
        return view('frontend.user.portal.document.view', compact('document'));
    }

    public function edit($id){

        $document = PortalDownload::findOrFail($id);
        return view('frontend.user.portal.document.edit', compact('document'));

    }

    public function update(UpdateRequest $request, $id){

        $document = PortalDownload::findOrFail($id);

        if($request->has('file')){

            try {

                $fileName = time().'_'.$request->file->getClientOriginalName();
                $file = $request->file('file')->storeAs('document', $fileName, 'public');

                $path = '/storage/' . $file;


            }catch (\Exception $e){
                return  redirect()->back()->withFlashError('Gagal memuatnaik dokumen');
            }

            \Storage::delete($document->file);
            $document->file = $path;
        }

        $document->name = $request->name;
        $document->group = $request->group;
        $document->description = $request->description;
        $document->is_show = ($request->has('is_show'))? 1 : 0;

        $document->save();

        return redirect()->route('frontend.user.portal.document.index')->withFlashSuccess('Dokumen berjaya dikemaskini');
    }

    public function delete($id){

        $document = PortalDownload::findOrFail($id);

        try {

            Storage::disk('public')->delete($document->file);

        }catch (\Exception $e){
            dd($e->getMessage());
        }

        $document->delete();

        return redirect()->route('frontend.user.portal.document.index')->withFlashSuccess('Dokumen berjaya dipadam');

    }

}
