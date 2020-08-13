<?php

namespace App\Models\Library;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class BorrowProcess extends Model{

    protected $table = 'lib_borrow_process';

    public function staffOut(){
        return $this->hasOne(User::class, 'id', 'out_id');
    }

    public function staffIn(){
        return $this->hasOne(User::class, 'id', 'in_id');
    }
}
