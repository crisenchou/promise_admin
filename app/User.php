<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isSuperAdmin()
    {
        return $this->name = 'root';
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    public function hasRole($role)
    {
        $roles = $this->roles;
        return $roles->contains($role);
    }

    public function hasPermission($permission)
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->contains($permission)) {
                return true;
            }
        }
        return false;
    }

    public function getStatusAttribute($status)
    {
        $statusArr = [
            -1 => '禁用',
            0 => '未激活',
            1 => '激活'
        ];
        return $statusArr[$status];
    }

}
