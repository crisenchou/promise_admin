<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];


    /**
     * The roles that belong to the user.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}
