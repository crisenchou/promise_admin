<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends AbstractBasicController
{

    protected $module = 'menu';
    protected $redirect = 'menu';
    protected $route = 'menu';
    protected $fillable = [
        'name' => '菜单名称',
        'url' => '菜单链接'
    ];


    public static function model()
    {
        return MenuRepository::class;
    }


}