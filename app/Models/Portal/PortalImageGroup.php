<?php
namespace App\Models\Portal;

use Illuminate\Database\Eloquent\Model;

class PortalImageGroup extends Model{


    public function images(){

        return $this->hasMany(PortalImages::class, 'group_id', 'id');
    }
}
