<?php
namespace App\Http\Controllers\Frontend\User\Library\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\Book\InsertRequest;
use App\Models\Library\Author;
use App\Models\Library\Book;
use App\Models\Library\BookParent;
use App\Models\Library\GroupParent;
use App\Models\Library\Payment;
use App\Models\Library\Publisher;
use Illuminate\Http\Request;

class AdminBookController extends Controller{

    public function index(){

        $books = Book::paginate(5);
        $groups = GroupParent::get();

        return view('frontend.user.library.admin.book.index', compact('books','groups'));
    }

    public function view($id){

        $book = Book::find($id);

        if(!$book){
            return redirect()->route('frontend.user.library.admin.book.index')->withFlashWarning("Nombor perolehan tidak wujud");
        }

        return view('frontend.user.library.admin.book.view', compact('book'));
    }

    public function add(){

        $groups = GroupParent::get();

        return view('frontend.user.library.admin.book.add', compact('groups'));
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
            $new_parent->is_borrow = 1;
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
        }

        $payment = Payment::where("name", $request->payment)->first();

        if(!$payment){
            #create new
            $new_payment = new Payment();
            $new_payment->user_id = auth()->user()->id;
            $new_payment->name = strtoupper($request->payment);
            $new_payment->receipt_ref = null;

            if(!$new_payment->save()){
                dd('Payment error!');
            }
        }

        $book->payment_id = ($payment)? $payment->id : $new_payment;
        $book->parent_id = ($parent)? $parent->id : $new_parent->id;
        $book->status = 1; #available
        $book->borrow_id = 0;
        $book->remark = "";

        if($book->save()){
            return redirect()->route('frontend.user.library.admin.book.add')->withFlashSuccess("Buku berjaya di daftarkan!");
        }else{
            return redirect()->route('frontend.user.library.admin.book.add')->withErrors("Gadal mendaftarkan buku!");

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

}
