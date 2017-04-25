<?php

namespace App\Repositories;

use App\Role;
use Bosnadev\Repositories\Eloquent\Repository;

class RoleRepository extends Repository
{
    public function model()
    {
        return Role::class;
    }
}