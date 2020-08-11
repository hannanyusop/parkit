<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class GroupParent extends Model{

    protected $table = 'lib_g_parents';

    public function subs(){
        return $this->hasMany(GroupSub::class, 'g_parent_id', 'id');
    }
}
