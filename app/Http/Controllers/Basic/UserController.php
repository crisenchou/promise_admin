<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public static function model()
    {
        return UserRepository::class;
    }

    protected function module()
    {
        return 'user';
    }
}
