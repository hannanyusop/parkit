<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model{

    protected $table = 'classes';

    #classroom teacher
    public function ct(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function currentStudent(){
        return $this->hasMany(StudentHasClass::class, 'class_id', 'id')
            ->where('year', date('Y'));
    }


}
