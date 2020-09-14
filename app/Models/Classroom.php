<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model{

    protected $table = 'classes';

    public $fillable = [
        'generate_name',
        'form',
        'name',
        'user_id',
        'is_active'
    ];

    #classroom teacher
    public function ct(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function currentStudent(){
        return $this->hasMany(StudentHasClass::class, 'class_id', 'id')
            ->where('year', date('Y'));
    }

    public function currentStudentM(){
        return $this->hasMany(StudentHasClass::class, 'class_id', 'id')
            ->where(function ($q){
                $q->whereHas('student',function ($q){
                    $q->where('gender', 'M');
                });
            })
            ->where('year', date('Y'));
    }

    public function currentStudentF(){
        return $this->hasMany(StudentHasClass::class, 'class_id', 'id')
            ->where(function ($q){
                $q->whereHas('student',function ($q){
                    $q->where('gender', 'F');
                });
            })
            ->where('year', date('Y'));
    }


}
