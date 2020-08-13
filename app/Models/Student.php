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


}
