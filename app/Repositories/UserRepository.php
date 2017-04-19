<?php

namespace App\Repositories;

use App\User;
use Bosnadev\Repositories\Eloquent\Repository;

class UserRepository extends Repository
{
    public function model()
    {
        return 'App\User';
        //return User::class;
    }
}