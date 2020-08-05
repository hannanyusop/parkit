<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class Join extends Model{

    protected $table = 'joins';
    protected $fillable = ['agree'];


    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function campaign(){
        return $this->hasOne(Campaign::class, 'id', 'campaign_id');
    }

    public function cards($campaign_id){
        return $this->hasMany(Card::class, 'user_id', 'user_id')
            ->where('campaign_id', $campaign_id)
            ->orderBy('draw_on', 'ASC')
            ->get();
    }

}
