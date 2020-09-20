<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model{

    protected $table = 'student_attendance';

    protected $fillable = ['uga_id', 'student_id', 'status', 'checkin','checkout', 'remark'];

    public function UGA(){
        return $this->hasOne(UserGenerateAttendance::class, 'id', 'uga_id');
    }

    public function student(){
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

}
