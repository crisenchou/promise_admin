<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\MenuRepository;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

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

    /**
     * init
     */
    protected function init()
    {
        parent::init();
        $icons = config('icon');
        $this->render['icons'] = $icons;
        $permissions = $this->permission->all();
        $this->render['permissions'] = array_merge(['0' => '所有权限'], $this->createMap($permissions));
        $menus = $this->menu->all();
        $this->render['menus'] = array_merge(['0' => '根路径'], $this->createMap($menus));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->menu->all();
        return $this->view('basic.menu.index', ['list' => $list]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('basic.menu.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($this->menu->create($request->except('_token'))) {
            return $this->success();
        } else {
            return $this->error();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->menu->find($id);
        return $this->view('basic.menu.show', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->menu->find($id);
        return $this->view('basic.menu.edit', ['model' => $model]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = $this->menu->find($id);
        if ($model->update($request->except('_token'))) {
            return $this->success();
        }
        return $this->error();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $model = $this->menu->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }


}