<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\MenuRepository;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends AbstractBasicController
{

    /**
     * set model
     * @return mixed
     */
    public static function model()
    {
        return MenuRepository::class;
    }


    /**
     * set the view path
     * @return string
     */
    protected function viewPath()
    {
        return 'menu';
    }


    /**
     * set the title
     * @return string
     */
    protected function title()
    {
        return '菜单管理';
    }


    /**
     * init
     */
    protected function init()
    {
        parent::init();
        $icons = config('icon');
        $this->render['icons'] = $icons;
        $permissions = app()->make(PermissionRepository::class)->all();
        $this->render['permissions'] = array_merge(['0' => '所有权限'], $this->createMap($permissions));
        $menus = $this->model->all();
        $this->render['menus'] = array_merge(['0' => '根路径'], $this->createMap($menus));
    }

    /**
     * create the mapArr
     * @param $collection
     * @return mixed
     */
    private function createMap($collection)
    {
        $flattened = $collection->mapWithKeys(function ($values) {
            return [$values->id => $values->name];
        });
        return $flattened->all();
    }

}