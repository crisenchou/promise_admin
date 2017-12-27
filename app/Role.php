<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $permissions
 * @mixin \Eloquent
 */
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
        return $this->belongsToMany(Permission::class);
    }
}
