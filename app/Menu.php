<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{


    public $fillable = ['parent_id','permission_id','name', 'url', 'target', 'icon', 'status'];

    /**
     * The roles that belong to the user.
     */
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }
}
