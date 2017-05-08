<?php

namespace App\Policies;

use App\Menu;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function before(User $user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function create(User $user, Menu $menu)
    {
        return $user->hasPermission($menu->permission_id);
    }
}
