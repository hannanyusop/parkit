<?php
namespace App\Models\Portal;

use Illuminate\Database\Eloquent\Model;

class PortalPage extends Model{


    public function imageGroups(){

        return $this->hasMany(PortalImageGroup::class, 'page_id', 'id');
    }


    public function texts(){
        return $this->hasMany(PortalText::class, 'page_id', 'id');
    }

    public function directories(){

        return $this->hasMany(PortalDirectory::class, 'page_id', 'id')
            ->orderBy('order', 'ASC');
    }

}
