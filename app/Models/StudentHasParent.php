<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use App\Models\Library\Borrow;
use Illuminate\Database\Eloquent\Model;

class StudentHasParent extends Model{

    protected $table = 'student_has_parents';

    public $fillable = [
        'student_id',
        'parent_id',
        'is_first',
        'relation',
    ];



}
