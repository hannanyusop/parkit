<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserGenerateAttendance extends Model{

    protected $fillable = ['tag'];

    protected $table = 'user_generate_attendance';

    public function staff(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function classroom(){
        return $this->hasOne(Classroom::class, 'id', 'class_id');
    }

    public function attendances(){

        return $this->hasMany(StudentAttendance::class,'uga_id', 'id');
    }

    public function attends(){

        return $this->hasMany(StudentAttendance::class,'uga_id', 'id')
            ->where('status', 2);
    }

    public function absents(){

        return $this->hasMany(StudentAttendance::class,'uga_id', 'id')
            ->where('status', 1);
    }

    public function mc(){

        return $this->hasMany(StudentAttendance::class,'uga_id', 'id')
            ->where('status', 3);
    }

    public function others(){

        return $this->hasMany(StudentAttendance::class,'uga_id', 'id')
            ->where('status', 4);
    }

}
