<?php
namespace App\Models\Portal;

use Illuminate\Database\Eloquent\Model;

class PortalDownload extends Model{

    protected $table = 'portal_downloads';

    protected $fillable = [
        'group'
    ];

}
