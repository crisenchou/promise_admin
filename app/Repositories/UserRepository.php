<?php

namespace App\Repositories;

use App\User;
use Crisen\Repositories\Eloquent\Repository;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }
}