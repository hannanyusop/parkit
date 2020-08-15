<?php

namespace App\Models\Library;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model{

    protected $table = 'lib_fines';

    protected $fillable = ['borrow_id', 'student_id' , 'staff_id', 'type', 'total_day', 'actual_rm', 'nego_rm', 'paid'];

    public function student(){
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
