<?php

namespace App\Models\Library;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class LogStaff extends Model{

    protected $table = 'lib_logs_staff';

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
