<?php
 namespace App\Http\Controllers\Frontend\User\Portal;

 use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Portal\EditDirectoryRequest;
use App\Models\Portal\PortalDirectory;
use App\Models\Portal\PortalPage;
use App\Models\Portal\PortalText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortalController extends Controller{

     public function index(){

         $pages = PortalPage::get();

         return view('frontend.user.portal.index', compact('pages'));
     }

     public function group($group){

         $pages = PortalPage::where('group', $group)
             ->get();

         if($pages->count() == 0){

             return redirect()->route('frontend.user.portal.index')->withFlashError('Kumpulan Tidak sah!');
         }

         return view('frontend.user.portal.group', compact('pages'));
     }

     public function edit($page_id){

         $page = PortalPage::find($page_id);

         if(!$page){
             return redirect()->route('frontend.user.portal.index')->withFlashError('Paparan Tidak sah!');
         }

         $isText = $page->texts;
         $isDirectory = $page->directories;
         $isImageGroup = $page->imageGroups;

         $texts = ($isText->count() > 0)? $isText : null;
         $directories = ($isDirectory->count() > 0)? $isDirectory : null;
         $imageGroup = ($isImageGroup->count() > 0)? $isImageGroup : null;


         return view('frontend.user.portal.edit', compact('page', 'directories', 'imageGroup', 'texts', 'page_id'));

     }

     public function editText($page_id, $text_id){

         $text = PortalText::where('page_id', $page_id)
             ->findOrFail($text_id);

         return view('frontend.user.portal.edit-text', compact('text'));
     }

     public function updateText(Request $request, $page_id, $text_id){

         $text = PortalText::where('page_id', $page_id)
             ->findOrFail($text_id);

         $text->text = $request->text;

         $text->save();
         return redirect()->route('frontend.user.portal.edit', $text->page_id)->withFlashSuccess('Berjaya dikemaskini!');

     }

     public function addDir(){

         dd('fsd');
         return view('frontend.user.portal.add-directory', compact('page_id'));

     }

     public function insertDirectory(Request $request, $page_id){

         $directory = new PortalDirectory();

         $directory->page_id = $page_id;
         $directory->group   = $request->group;
         $directory->name   = strtoupper($request->name);
         $directory->position = strtoupper($request->position);
         $directory->image = $request->image;
         $directory->order = $request->order;
         $directory->save();

         return redirect()->route('frontend.user.portal.edit', $directory->page_id)->withFlashSuccess('Berjaya dikemaskini!');

     }

    public function editDirectory($page_id, $directory_id){


         $directory = PortalDirectory::where('page_id', $page_id)
             ->findOrFail($directory_id);

        return view('frontend.user.portal.edit-directory', compact('directory'));

    }

    public function updateDirectory(EditDirectoryRequest $request, $page_id, $directory_id){


        $directory = PortalDirectory::where('page_id', $page_id)
            ->findOrFail($directory_id);


        if($request->has('image')){

            $timestamp = time();
            $extension = $request->image->extension();
            $request->image->storeAs('/public', $timestamp.".".$extension);
            $url = Storage::url($timestamp.".".$extension);
            Storage::delete($directory->image);

            $directory->image = $url;

        }


        $directory->group   = $request->group;
        $directory->name   = strtoupper($request->name);
        $directory->position = strtoupper($request->position);
        $directory->order = $request->order;
        $directory->save();

        return redirect()->route('frontend.user.portal.edit', $directory->page_id)->withFlashSuccess('Berjaya dikemaskini!');


    }
 }

?>
