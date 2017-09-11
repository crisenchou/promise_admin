<?php

namespace App\Repositories;

use App\Permission;
use Crisen\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository
{
    public function model()
    {
        return Permission::class;
    }
}