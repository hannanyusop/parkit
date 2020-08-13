<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{

    protected $table = 'lib_books';

    protected $fillable = ['status', 'borrow_id'];

    public function payment(){
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }

    public function parent(){
        return $this->hasOne(BookParent::class, 'id', 'parent_id');
    }

    public function activeBorrow(){
        return $this->hasOne(Borrow::class, 'book_id', 'id');
    }
}
