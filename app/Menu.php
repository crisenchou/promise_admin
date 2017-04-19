<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    /**
     * The roles that belong to the user.
     */
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }
}
