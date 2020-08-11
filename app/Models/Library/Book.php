<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{

    protected $table = 'lib_books';

    public function payment(){
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }

    public function parent(){
        return $this->hasOne(BookParent::class, 'id', 'parent_id');
    }
}
