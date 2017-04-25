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
        $permissions = app()->make(PermissionRepository::class)->all();
        $this->render['permissions'] = $this->createMap($permissions);;
        $menus = $this->model->all();
        $this->render['menus'] = $this->createMap($menus);
    }

    private function createMap($collection){

        $flattened = $collection->mapWithKeys(function ($values) {
            return   [$values->id=>$values->name];
        });
        return $flattened->all();
    }

}