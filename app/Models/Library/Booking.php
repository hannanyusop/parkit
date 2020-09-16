<?php

namespace App\Models\Library;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model{

    protected $table = 'lib_bookings';

    public function applicant(){
        return $this->hasOne(User::class, 'id', 'staff_id');
    }

    public function checkBy(){
        return $this->hasOne(User::class, 'id', 'admin_id');
    }

}
