<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasClass extends Model{

    protected $table = 'user_has_class';

    public function classroom(){
        return $this->hasOne(Classroom::class, 'id', 'class_id');
    }


}
