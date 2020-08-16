<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use App\Models\Library\Borrow;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    protected $table = 'students';

    public function notReturnBook(){
        return $this->hasMany(Borrow::class, 'student_id', 'id')
            ->where('return_date', null)
            ->where('fine_id', null);
    }

    public function classroom(){
        return $this->hasOne(Classroom::class, 'id', 'class_id');
    }

    public function currentClass(){
        return $this->hasOne(StudentHasClass::class, 'student_id', 'id')
            ->where('year', date('Y'));
    }


}
