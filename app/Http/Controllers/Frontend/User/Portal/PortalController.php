<?php
 namespace App\Http\Controllers\Frontend\User\Portal;

 use App\Http\Controllers\Controller;
use App\Models\Portal\PortalPage;

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


         return view('frontend.user.portal.edit', compact('page', 'directories', 'imageGroup', 'texts'));

     }
 }

?>
