<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class GroupSub extends Model{

    protected $table = 'lib_g_subs';

    public function parent(){
        return $this->hasOne(GroupParent::class, 'id', 'g_parent_id');
    }

    public function books(){
        return $this->hasMany(BookParent::class, 'g_sub_id', 'id');
    }
}
