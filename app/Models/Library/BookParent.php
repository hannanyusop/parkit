<?php

namespace App\Models\Library;

use Illuminate\Database\Eloquent\Model;

class BookParent extends Model{

    protected $table = 'lib_parents';

    public function author(){
        return $this->hasOne(Author::class, 'id', 'author_id');
    }

    public function publisher(){
        return $this->hasOne(Publisher::class, 'id', 'publisher_id');
    }

    public function subGroup(){
        return $this->hasOne(GroupSub::class, 'id', 'g_sub_id');
    }
}
