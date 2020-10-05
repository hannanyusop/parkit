<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\Book\InsertRequest;
use App\Http\Requests\Frontend\User\Library\Book\UpdateParentRequest;
use App\Http\Requests\Frontend\User\Library\Book\UpdateRequest;
use App\Models\Library\Author;
use App\Models\Library\Book;
use App\Models\Library\BookParent;
use App\Models\Library\Borrow;
use App\Models\Library\GroupParent;
use App\Models\Library\Payment;
use App\Models\Library\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Compound;

class AdminBookController extends Controller{

    public function index(Request $request){

        $query = Book::where(function ($q) use ($request){

            $q->whereHas('parent', function ($q) use ($request){

                $q->where('title', 'LIKE', "%".$request->title."%");

            })->orWhere('id', 'LIKE', "%".$request->title."%");
        });

            if($request->status != ""){

//                dd('masuk');
                $query->where('status', $request->status);
            }

            $books = $query->paginate(20);

        return view('frontend.user.library.admin.book.index', compact('books'));
    }

    public function view($id){

        $book = Book::find($id);

        if(!$book){
            return redirect()->route('frontend.user.library.admin.book.index')->withFlashWarning("Nombor perolehan tidak wujud");
        }

        return view('frontend.user.library.admin.book.view', compact('book'));
    }

    public function add(){

        #continue last user input;
        $last_book = Book::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->first();

        if(!$last_book){
            $last_book = Book::orderBy('created_at', 'DESC')
                ->first();

            if(!$last_book){

                $last_book_id = 1;
            }else{

                $last_book_id = $last_book->id;
            }
        }else{

            $last_book_id = $last_book->id;
        }


        do{
            #prevent from error;
            $last_book_id++;
            $check = Book::find($last_book_id);

        }while($check);

        $groups = GroupParent::get();

        return view('frontend.user.library.admin.book.add', compact('groups', 'last_book_id'));
    }

    public function insert(InsertRequest $request){

//        dd($request->input());

        #check if title exist
        $parent = BookParent::where('title', $request->title)
            ->first();

        #check sensitive data
        if(!is_null($request->no_per)){

            $check = Book::find($request->no_per);
            if($check){
                return redirect()->route('frontend.user.library.admin.book.add')->withFlashWarning("Nombor perolehan : ".$request->no_per." telah didaftarkan atas buku ".$check->parent->title);
            }

        }

        if(!$parent){

            #create new parent
            $new_parent = new BookParent();

            $author = Author::where("name", $request->author)->first();

            if(!$author){
                #create new author
                $new_author = new Author();
                $new_author->name = strtoupper($request->author);

                if(!$new_author->save()){
                    dd("Create new author error!");
                }

                $new_parent->author_id = $new_author->id;

            }else{
                $new_parent->author_id = $author->id;
            }

            $publisher = Publisher::where("name", $request->publisher)->first();

            if(!$publisher){

                $new_pub = new Publisher();
                $new_pub->name = strtoupper($request->publisher);
                $new_pub->address = "";
                $new_pub->phone_number = "";

                if(!$new_pub->save()){
                    dd("Create new publisher error!");
                }

                $new_parent->publisher_id = $new_pub->id;
            }else{
                $new_parent->publisher_id = $publisher->id;
            }


            $new_parent->g_sub_id = $request->group;
            $new_parent->title = strtoupper($request->title);
            $new_parent->is_borrow = ($request->is_borrow == 1)? 1 : 0;
            $new_parent->is_fiction = ($request->is_fiction == 1)? 1 : 0;
            $new_parent->price = $request->price;
            $new_parent->pages = $request->pages;
            $new_parent->remark = "";

            if(!$new_parent->save()){
                dd("Error creating new parent!");
            }

        }

        $book = new Book();


        if($request->no_per != "" || !is_null($request->no_per)){
            $book->id = $request->no_per;
        }else{

            #continue last user input;
            $last_book = Book::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'DESC')
                ->first();

            if(!$last_book){
                $last_book = Book::orderBy('created_at', 'DESC')
                    ->first();

                if(!$last_book){

                    $last_book_id = 1;
                }else{

                    $last_book_id = $last_book->id;
                }
            }else{

                $last_book_id = $last_book->id;
            }

            do{
                #prevent from error;
                $last_book_id++;
                $check = Book::find($last_book_id);

            }while($check);

            $book->id = $last_book_id;
        }

        $payment = Payment::where("name", $request->payment)->first();

        if(!$payment){
            #create new
            $new_payment = new Payment();
            $new_payment->user_id = auth()->user()->id;
            $new_payment->name = strtoupper($request->payment);
            $new_payment->receipt_ref = "";

            if(!$new_payment->save()){
                dd('Payment error!');
            }
        }

        $book->payment_id = ($payment)? $payment->id : $new_payment->id;
        $book->parent_id = ($parent)? $parent->id : $new_parent->id;
        $book->status = 1; #available
        $book->user_id = auth()->user()->id;
        $book->borrow_id = 0;
        $book->remark = "";

        if($book->save()){
            return redirect()->route('frontend.user.library.admin.book.add')->withFlashSuccess("Buku berjaya di daftarkan!");
        }else{
            return redirect()->route('frontend.user.library.admin.book.add')->withErrors("Gadal mendaftarkan buku!");

        }

    }

    public function edit($id){

        $book = Book::find($id);

        if(!$book){
            return redirect()->back()->withFlashWarning("Maklumat buku tidak dijumpai.");
        }

        return view('frontend.user.library.admin.book.edit', compact('book'));

    }

    public function update(UpdateRequest $request, $id){

        $book = Book::find($id);
        if(!$book){
            return redirect()->route('frontend.user.library.admin.book.index')->withFlashWarning("Maklumat buku tidak dijumpai.");
        }

        $payment = Payment::where("name", $request->payment)->first();

        if(!$payment){
            #create new
            $new_payment = new Payment();
            $new_payment->user_id = auth()->user()->id;
            $new_payment->name = strtoupper($request->payment);
            $new_payment->receipt_ref = "";

            if(!$new_payment->save()){
                dd('Payment error!');
            }
        }

        $book->payment_id = ($payment)? $payment->id : $new_payment->id;
        $book->remark = $request->remark;

        if($book->save()){
            return redirect()->route('frontend.user.library.admin.book.edit', $book->id)->withFlashSuccess("Salianan ".getBookId($book->id)." berjaya di kemaskini!");
        }else{
            return redirect()->route('frontend.user.library.admin.book.index')->withErrors("Gadal mangemaskini buku ".getBookId($book->id));
        }

    }

    public function updateParent(UpdateParentRequest $request, $id){

        $book = Book::find($id);
        if(!$book){
            return redirect()->route('frontend.user.library.admin.book.index')->withFlashWarning("Maklumat buku tidak dijumpai.");
        }

        $parent = $book->parent;

        $author = Author::where("name", $request->author)->first();

        if(!$author){
            #create new author
            $new_author = new Author();
            $new_author->name = strtoupper($request->author);

            if(!$new_author->save()){
                dd("Create new author error!");
            }

            $parent->author_id = $new_author->id;

        }else{
            $parent->author_id = $author->id;
        }

        $publisher = Publisher::where("name", $request->publisher)->first();

        if(!$publisher){

            $new_pub = new Publisher();
            $new_pub->name = strtoupper($request->publisher);
            $new_pub->address = "";
            $new_pub->phone_number = "";

            if(!$new_pub->save()){
                dd("Create new publisher error!");
            }
            $parent->publisher_id = $new_pub->id;

        }else{
            $parent->publisher_id = $publisher->id;
        }

        $parent->g_sub_id = $request->group;
        $parent->title = strtoupper($request->title);
        $parent->is_borrow = ($request->is_borrow == 1)? 1 : 0;
        $parent->is_fiction = ($request->is_fiction == 1)? 1 : 0;
        $parent->price = $request->price;
        $parent->pages = $request->pages;

        if($parent->save()){
            return redirect()->route('frontend.user.library.admin.book.edit', $book->id)->withFlashSuccess("Buku ".$parent->title." berjaya di kemaskini!");
        }else{
            return redirect()->route('frontend.user.library.admin.book.index')->withErrors("Gadal mangemaskini buku".$parent->title);
        }
    }

    public function checkTitle(Request $request){


//        if($request->ajax()) {

            $data = BookParent::where('title', 'LIKE', $request->title."%")
                ->limit(10)
                ->get();

            $output = '';

            if (count($data)>0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row){

                    $output .= '<li class="list-group-item" data-book_id="'.$row->id.'">'.$row->title.'</li>';
                }

                $output .= '</ul>';
            }
            else {

                $output .= '';
            }

            return $output;
//        }
    }

    public function printLabel(Request $request){


        $added =  (Session::has('added'))? session('added') :  Session::put('added', []);

        $parents = null;

        #title

        if($request->has('title')){

            $parents = BookParent::where('title', 'LIKE', "%".$request->title."%")
                ->get();
        }
        return view('frontend.user.library.admin.book.print-label', compact('parents', 'added'));
    }

    public function addPrintLabel(Request $request){


        if($request->has('book')){

            $added =  (Session::has('added'))? session('added') :  Session::put('added', []);
            foreach ($request->book as $book){

                $check_book = Book::find($book);

                if($check_book){
                    $added[$book] = $check_book->parent->title;
                }
            }

            session(['added' => $added]);
            return redirect()->route('frontend.user.library.admin.book.print-label')->withFlashSuccess("Senarai buku berjaya ditambah.");


        }else{
            return redirect()->route('frontend.user.library.admin.book.print-label')->withErrors("Sila tanda buku yang dikhendaki!");
        }


    }

    public function printLabelRemove($id){

        $added =  (Session::has('added'))? session('added') :  Session::put('added', []);

        if(isset($added[$id])){

            unset($added[$id]);

            session(['added' => $added]);
            return redirect()->route('frontend.user.library.admin.book.print-label')->withFlashSuccess("Senarai buku berjaya di singkirkan.");
        }else{
            return redirect()->route('frontend.user.library.admin.book.print-label')->withErrors("Buku tidak wujud.");
        }

    }

    public function printLabelNow(){

        $added =  (Session::has('added'))? session('added') :  Session::put('added', []);

        if(count($added) == 0){

            return redirect()->route('frontend.user.library.admin.book.print-label')->withErrors("Sila tambah buku terlebih dahulu.");

        }else{

            $books = Book::whereIn('id',array_keys($added))->get();
            return view('frontend.user.library.admin.book.print-label-now', compact('books'));

        }

    }

    public function printLabelRemoveAll(){

        session(['added' => []]);
        return redirect()->route('frontend.user.library.admin.book.print-label')->withFlashSuccess("Senarai buku berjaya di kosongkan.");

    }

    public function autoFill(Request $request){

//        if($request->ajax()) {

            $book = BookParent::find($request->book_id);

            if($book){

                $last_insert = Book::where('parent_id', $book->id)
                    ->orderBy('created_at', 'DESC')
                    ->first();

                $data = [
                    'author' => $book->author->name,
                    'publisher' => $book->publisher->name,
                    'price' => $book->price,
                    'pages' => $book->pages,
                    'is_borrow' => $book->is_borrow,
                    'is_fiction' => $book->is_fiction,
                    'payment' => ($last_insert)? $last_insert->payment->name : "",
                    'group_id' => $book->g_sub_id
                ];


                return \response()->json(array(
                    'success' => true,
                    'data' => $data
                ));

            }else{
                return \response()->json(array(
                    'success' => false
                ));
            }
//        }

    }

    public function printLabelRange(Request $request){

        $books = null;
        if(!is_null($request->start) && !is_null($request->end)){

            $books = Book::whereBetween('id', [$request->start, $request->end])
                ->get();
        }

        return view('frontend.user.library.admin.book.print-label-range', compact('books'));
    }

    public function printList(Request $request){

        $books = null;
        if(!is_null($request->start) && !is_null($request->end)){

            $books = Book::whereBetween('id', [$request->start, $request->end])
                ->get();
        }

        return view('frontend.user.library.admin.book.print-list', compact('books'));

    }

    public function deleteParent($parent_id){

        $parent = BookParent::findOrFail($parent_id);

        $books = Book::where('parent_id', $parent_id)->get();

        foreach ($books as $book){

            $borrows = Borrow::where('book_id', $book->id)->get();

            foreach ($borrows as $borrow){

                if($borrow->fine){

                    $borrow->fine->delete();
                }
                $borrow->delete();
            }
            $book->delete();
        }

        $parent->delete();

        return redirect()->route('frontend.user.library.admin.book.index')->withFlashSuccess('Semua Buku '.$parent->title." berjaya dipadam");

    }

    public function deleteChild($book_id){

        $book = Book::findOrFail($book_id);

        $borrows = Borrow::where('book_id', $book->id)->get();

        foreach ($borrows as $borrow){

            if($borrow->fine){

                $borrow->fine->delete();
            }
            $borrow->delete();
        }


        $book->delete();

        return redirect()->route('frontend.user.library.admin.book.index')->withFlashSuccess('Buku '.getBookId($book->id)." berjaya dipadam");

    }

}
