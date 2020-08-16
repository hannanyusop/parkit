<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvEvent extends Model{

    protected $table = 'cv_events';

    public $fillable = ['name', 'manual_token', 'token', 'static_token', 'status'];

    public function users(){
        return $this->hasMany(CvLog::class, 'event_id', 'id');
    }

}
