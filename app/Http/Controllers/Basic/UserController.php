<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends AbstractBasicController
{
    protected $title = '用户管理';
    protected $fillable = [
        'email' => '邮箱',
        'name' => '名字',
        'status' => '状态',
        'created_at' => '加入时间'
    ];

    public static function model()
    {
        return UserRepository::class;
    }
}
