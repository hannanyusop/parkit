<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class CvLog extends Model{

    protected $table = 'cv_logs';

    public function event(){
        return $this->hasOne(CvEvent::class, 'id', 'event_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }

}
