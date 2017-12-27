<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read mixed $human_status
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
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
        $role = $this->getArrayFrom($role);
        if (is_array($role)) {
            foreach ($role as $item) {
                if ($this->isRole($item)) {
                    return true;
                }
            }
            return false;
        } else {
            return $this->isRole($role);
        }
    }


    public function isRole($role)
    {
        $roles = $this->roles;
        return $roles->contains(function ($value, $key) use ($role) {
            return $value->id == $role || $value->name == $role;
        });
    }


    private function getArrayFrom($argument)
    {
        return (!is_array($argument)) ? preg_split('/ ?[,|] ?/', $argument) : $argument;
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

    public function getHumanStatusAttribute()
    {
        $status = $this->getOriginal('status');
        $statusArr = config('dictionary.status');
        return array_get($statusArr, $status);
    }

}
