<?php

namespace App\Models\Library;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Log extends Model{

    protected $table = 'lib_logs';

    public function student(){
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
