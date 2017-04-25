<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\MenuRepository;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends AbstractBasicController
{

    protected $title = '菜单管理';
    protected $view = 'menu';


    public static function model()
    {
        return MenuRepository::class;
    }


    protected function init()
    {
        $icons = config('icon');
        $this->render['icons'] = $icons;
        $permissions = app()->make(PermissionRepository::class)->all();
        $this->render['permissions'] = array_merge(['0' => '所有权限'], $this->createMap($permissions));
        $menus = $this->model->all();
        $this->render['menus'] = array_merge(['0' => '根路径'], $this->createMap($menus));
    }

    private function createMap($collection)
    {
        $flattened = $collection->mapWithKeys(function ($values) {
            return [$values->id => $values->name];
        });
        return $flattened->all();
    }

}