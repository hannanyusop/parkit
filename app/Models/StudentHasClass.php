<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class StudentHasClass extends Model{

    protected $table = 'student_has_class';

    protected $fillable = ['class_id'];

    public function student(){
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function classroom(){
        return $this->hasOne(Classroom::class, 'id', 'class_id');
    }

}
