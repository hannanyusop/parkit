<?php
namespace App\Http\Controllers\Frontend\User\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\Library\Borrow\AddListRequest;
use App\Models\Library\Book;
use App\Models\Library\Borrow;
use App\Models\Library\BorrowProcess;
use App\Models\Library\Fine;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class BorrowController extends Controller{

    public function borrowBook(Request $request){

        $student = null;
        $bookList = null;

        if(getLibraryOption('can_borrow') != 1 ){
            return view('frontend.user.library.borrow.borrow-closed');
        }


        if($request->has('no_ic')){

            $student = Student::where('no_ic', $request->no_ic)
                ->first();

            if(!$student){
                return redirect()->route('frontend.user.library.borrow.borrow')->withFlashWarning("Tiada Nombor Kad Pengenalan dijumpai bagi ".$request->no_ic);
            }

            $no_ic = $student->no_ic;
            $bookList = (Session::has('borrow'.$no_ic))? Session::get('borrow'.$no_ic) : Session::put('borrow'.$no_ic, []);

        }

        return view('frontend.user.library.borrow.borrow-book', compact('student', 'bookList'));
    }

    public function borrowAddList(AddListRequest $request){

        $no_ic = $request->no_ic;

        $bookList = (Session::has('borrow'.$no_ic))? Session::get('borrow'.$no_ic) : Session::put('borrow'.$no_ic, []);

        $book = Book::find($request->id);

        if($book->parent->is_borrow == 0){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $request->no_ic])->withFlashInfo("Buku ini tidak boleh dipinjam");
        }

        if($book->status == 3){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $request->no_ic])->withFlashInfo("Buku ini telah dilupus");
        }

        if($book->borrow_id != 0){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $request->no_ic])->withFlashWarning("Buku masih belum dipulangkan!");
        }

        if(isset($bookList[$book->id])){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $request->no_ic])->withFlashWarning("Buku dalam senarai!");

        }

        $student = Student::where('no_ic', $no_ic)->first();

        $balance = getLibraryOption('max_student_borrow', 2)-$student->notReturnBook->count();

        if(count($bookList) >= $balance){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $request->no_ic])->withFlashWarning("Hanya ".$balance." buah buku yang dibenarkan bagi pelajar ini.");
        }

        $bookList[$book->id] = [
            'title' => $book->parent->title,
            'publisher' => $book->parent->publisher->name,
            'author' => $book->parent->author->name,
            'type' => $book->parent->subGroup->code." - ".$book->parent->subGroup->name
        ];

        Session::put('borrow'.$no_ic, $bookList);
        return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $request->no_ic])->withFlashSuccess("Buku berjaya ditambah!");
    }

    public function borrowRemoveList($no_ic, $book_id){


        $student = Student::where('no_ic', $no_ic)
            ->first();

        if(!$student){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $no_ic])->withFlashWarning("Tiada Nombor Kad Pengenalan dijumpai bagi ".$no_ic);
        }

        $bookList = (Session::has('borrow'.$no_ic))? Session::get('borrow'.$no_ic) : Session::put('borrow'.$no_ic, []);

        if(isset($bookList[$book_id])){
            unset($bookList[$book_id]);
            Session::put('borrow'.$no_ic, $bookList);
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $no_ic])->withFlashSuccess("Buku berjaya disingkirkan.");

        }else{
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $no_ic])->withFlashWarning("Buku tiada dalam senarai!");

        }

    }

    public function borrowSubmit($no_ic){

        $student = Student::where('no_ic', $no_ic)
            ->first();

        if(!$student){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $no_ic])->withFlashWarning("Tiada Nombor Kad Pengenalan dijumpai bagi ".$no_ic);
        }

        $bookList = (Session::has('borrow'.$no_ic))? Session::get('borrow'.$no_ic) : Session::put('borrow'.$no_ic, []);

        if(count($bookList) == 0){
            return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $no_ic])->withFlashWarning("Sila tambah sekurang-kurangnya satu(1) buku!");
        }

        #check book
        foreach ($bookList as $key => $book) {

            $book = Book::where('status', 1)
                ->where('borrow_id', 0)
                ->where('id', $key)
                ->first();

            if(!$book){
                return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $no_ic])->withFlashWarning("Buku ".getBookId($key)." - ".$book->parent->title. " perlu disingkirkan.");
            }
        }

        $duration = getLibraryOption('borrow_duration', 7);
        foreach ($bookList as $key => $book){
            #insert data to table borrow;
            $borrow = new Borrow();
            $borrow->book_id = $key;
            $borrow->is_staff = 0;
            $borrow->staff_id = null;
            $borrow->student_id = $student->id;
            $borrow->out_id = auth()->user()->id;
            $borrow->in_id = null;
            $borrow->fine_id = null;
            $borrow->borrow_date = now();
            $borrow->actual_return_date = date('Y-m-d', strtotime(now(). " +".$duration." days"));
            $borrow->return_date = null;
            $borrow->remark = json_encode([]);

            #remark for pengawas perpustakaan
            if(auth()->user()->can('lib_prefects')){

                $borrow->remark = json_encode(['peminjaman' => Session::get('prefect')]);
            }

            if(!$borrow->save()){
                return redirect()->route('frontend.user.library.borrow.borrow', ['no_ic' => $no_ic])->withFlashWarning("Gagal memasukan data buku :".getBookId($key));
            }

            #update book
            Book::find($key)->update(['status' => 2, 'borrow_id' => $borrow->id]);

        }

        Session::forget('borrow'.$no_ic);

        return redirect()->route('frontend.user.library.borrow.borrow')->withFlashSuccess("Peminjaman berjaya.");
    }

    public function returnBook(Request $request){

        $book = null; $diff = null; $late = null;

        if($request->has('id')){
            $book = Book::find($request->id);

            if(!$book){
                return redirect()->route('frontend.user.library.borrow.return')->withFlashWarning("Buku tidak dijumpai!");
            }

            if($book->borrow_id == 0 || $book->status != 2){
                return redirect()->route('frontend.user.library.borrow.return')->withFlashWarning("Buku bukan dalam senarai dipinjam.");
            }

            $now = new \DateTime(date('Y-m-d'));
            $actual = new \DateTime($book->activeBorrow->actual_return_date);

            $late = ($now > $actual)? true : false;
            $diff = $actual->diff($now)->format("%a");


        }
        return view('frontend.user.library.borrow.return-book', compact('book', 'diff', 'late'));
    }

    public function returnSubmit($book_id){

        $book = Book::where('id',$book_id)
            ->where('status', 2)
            ->where('borrow_id', "!=", 0)
            ->first();

        if(!$book){
            return redirect()->route('frontend.user.library.borrow.return')->withFlashWarning("Buku tidak dijumpai!");
        }

        #check if late

        #update
        $borrow = Borrow::find($book->borrow_id);
        $borrow->in_id = auth()->user()->id;
        $borrow->return_date = now();

        #remark for pengawas perpustakaan
        if(auth()->user()->can('lib_prefects')){

            $remark = json_decode($borrow->remark, true);
            $remark['Pemulangan'] = Session::get('prefect');
            $borrow->remark = json_encode($remark);
        }

        $now = new \DateTime(date('Y-m-d'));
        $actual = new \DateTime($book->activeBorrow->actual_return_date);

        $late = ($now > $actual)? true : false;
        $diff = $actual->diff($now)->format("%a");

        if($late){

            $fine = Fine::updateOrCreate(
                ['borrow_id' => $borrow->id],
                [
                    'student_id' => $borrow->student_id,
                    'staff_id' => auth()->user()->id,
                    'borrow_id' => $borrow->id,
                    'type' => 1,
                    'total_day' => $diff,
                    'actual_rm' => $diff*getLibraryOption('fine', 0.20),
                    'nego_rm' => 0.00,
                    'paid' => 0
                ]
            );

            $borrow->fine_id = $fine->id;
            $borrow->save();
            $book->borrow_id = 0;
            $book->status = 1;
            $book->save();

            return redirect()->route('frontend.user.library.borrow.return-fine', $fine->id)->withFlashSuccess("Resit denda berjaya dijana!");

        }

        $borrow->save();
        $book->borrow_id = 0;
        $book->status = 1;
        $book->save();

        return redirect()->route('frontend.user.library.borrow.return')->withFlashSuccess("Buku berjaya dikembalikan!");
    }

    public function returnFine($fine_id){

        $fine = Fine::where('paid', 0)
            ->find($fine_id);

        if(!$fine){
            return redirect()->route('frontend.user.library.borrow.return')->withFlashInfo("Tiada resit saman dijumpa!");
        }

        return view('frontend.user.library.borrow.return-fine', compact('fine'));
    }

    public function late(){

        $lates = Borrow::whereRaw('Date(actual_return_date) < CURDATE()')
            ->where('return_date', null)
            ->get();

        return view('frontend.user.library.borrow.late', compact('lates'));
    }

    public function fine(){

        $fines = Fine::get();

        return view('frontend.user.library.borrow.fine', compact('fines'));

    }

    public function history(Request $request){

        $borrows = Borrow::get();
        return view('frontend.user.library.borrow.history', compact('borrows'));

    }

    public function historyView($id){

        $borrow = Borrow::findOrFail($id);
        return view('frontend.user.library.borrow.history-view', compact('borrow'));

    }


}
