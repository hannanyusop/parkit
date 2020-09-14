<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use App\Models\Library\Borrow;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model{

    protected $table = 'student_parents';

    public $fillable = [
        'no_ic',
        'name',
        'nationality',
        'race',
        'religion',
        'job',
        'income',
        'income_status',
        'phone_1',
        'phone_2',
        'employer_name',
        'employer_phone',
        'employer_address',
    ];



}
