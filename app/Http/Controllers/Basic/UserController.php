<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends AbstractBasicController
{
    protected $title = '用户管理';
    protected $view = 'user';


    protected function title()
    {
        return '用户管理';
    }

    protected function viewPath()
    {
        return 'user';
    }

    public static function model()
    {
        return UserRepository::class;
    }
}