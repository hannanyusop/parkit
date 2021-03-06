<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvEvent extends Model{

    protected $table = 'cv_events';

    public $fillable = ['manual_token'];

    public function users(){
        return $this->hasMany(CvLog::class, 'event_id', 'id');
    }

}
