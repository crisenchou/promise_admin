<?php

namespace App\Http\Controllers\Admin\Core;

use App\Http\Requests\MenuRequest;
use App\Menu;

class MenuController extends AbstractCoreController
{

    protected $menu;
    public $title = '菜单管理';

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }


    public function index()
    {

        $collection = $this->menu->get();
        $collection = $collection->keyBy(function ($item) {
            return $item->id;
        })->toArray();

        $list = getTree($collection, 'parent_id', 'subMenu');

        return $this->view('core.menu.index', compact('list'));
    }

    public function create()
    {
        $menus = $this->menu->pluck('name', 'id');
        return $this->view('core.menu.create', compact('menus'));
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
        return $this->view('core.menu.show', compact('model'));
    }


    public function edit($id)
    {
        $menus = $this->menu->pluck('name', 'id');
        $model = $this->menu->find($id);
        return $this->view('core.menu.edit', compact('menus', 'model'));
    }


    public function update(MenuRequest $request, $id)
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
     * @throws \Exception
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