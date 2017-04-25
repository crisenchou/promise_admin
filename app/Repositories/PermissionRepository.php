<?php

namespace App\Repositories;

use App\Permission;
use Bosnadev\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository
{
    public function model()
    {
        return Permission::class;
    }
}