<?php

namespace App\Http\Controllers\Basic;

use App\Http\Requests\MenuRequest;
use App\Repositories\MenuRepository;
use App\Repositories\PermissionRepository;

class MenuController extends AbstractBasicController
{


    protected $menu;
    protected $permission;
    public $title = '菜单管理';


    public function __construct(MenuRepository $menu, PermissionRepository $permission)
    {
        $this->menu = $menu;
        $this->permission = $permission;
    }


    public function index()
    {
        $list = $this->menu->findAllBy('parent_id', 0);
        return $this->view('basic.menu.index', compact('list'));
    }

    public function create()
    {
        $permissions = $this->createMap($this->permission->all());
        $menus = $this->createMap($this->menu->all());
        return $this->view('basic.menu.create', compact('permissions', 'menus'));
    }


    public function store(MenuRequest $request)
    {
        if ($this->menu->create($request->except('_token'))) {
            return $this->success();
        } else {
            return $this->error();
        }
    }


    public function show($id)
    {
        $model = $this->menu->find($id);
        return $this->view('basic.menu.show', compact('model'));
    }


    public function edit($id)
    {
        $permissions = $this->createMap($this->permission->all());
        $menus = $this->createMap($this->menu->all());
        $model = $this->menu->find($id);
        return $this->view('basic.menu.edit', compact('permissions', 'menus', 'model'));
    }


    public function update(MenuRequest $request, $id)
    {
        $model = $this->menu->find($id);
        if ($model->update($request->except('_token'))) {
            return $this->success();
        }
        return $this->error();
    }


    public function destroy($id)
    {
        $model = $this->menu->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }


}