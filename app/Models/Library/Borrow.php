<?php

namespace App\Models\Library;

use App\Domains\Auth\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model{

    protected $table = 'lib_borrows';

    public function borrower(){
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function book(){
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function fine(){

        return $this->hasOne(Fine::class,'borrow_id', 'id');
    }

    public function staffOut(){
        return $this->hasOne(User::class, 'id', 'out_id');
    }

    public function staffIn(){
        return $this->hasOne(User::class, 'id', 'in_id');
    }
}
