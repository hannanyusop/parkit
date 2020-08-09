<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model{

    protected $table = 'campaigns';


    public function organizer(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function participants(){
        return $this->hasMany(Join::class, 'campaign_id', 'id');
    }

    public function participantsActive(){
        return $this->hasMany(Join::class, 'campaign_id', 'id')
            ->whereIn('invited', array(1))
            ->orWhereIn('approve', array(1));
    }

    public function participantsTakePart(){
        return $this->hasMany(Join::class, 'campaign_id', 'id')
            ->where('agree', 1);
    }


    public function cards(){
        return $this->hasMany(Card::class, 'campaign_id', 'id');
    }

    public function cardsUsed(){
        return $this->hasMany(Card::class, 'campaign_id', 'id')
            ->where('user_id','!=', null);
    }


    public function cardsWon(){
        return $this->hasMany(Card::class, 'campaign_id', 'id')
            ->where('is_won', 1);
    }

    public function cardsWonOwned(){
        return $this->hasMany(Card::class, 'campaign_id', 'id')
            ->where('is_won', 1)
            ->where('user_id', '!=', null);
    }

    public function pendingApplicants(){
        return $this->hasMany(Join::class, 'campaign_id', 'id')
            ->where('invited', 0)
            ->where('approve', 0);
    }

}
