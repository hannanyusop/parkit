<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class Card extends Model{

    protected $table = 'campaign_card';

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
