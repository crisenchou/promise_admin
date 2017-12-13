<?php

namespace App\Http\Controllers\Core;

use App\Http\Requests\PermissionRequest;
use App\Repositories\PermissionRepository;

class PermissionController extends AbstractCoreController
{

    protected $permission;
    public $title = '权限管理';


    public function __construct(PermissionRepository $permission)
    {
        $this->model = $permission;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->model->all();
        return $this->view('basic.permission.index', compact('list'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('basic.permission.create');
    }

    public function store(PermissionRequest $request)
    {

        if ($this->model->create($request->except('_token'))) {
            return $this->success();
        } else {
            return $this->error();
        }
    }

    public function show($id)
    {
        $model = $this->model->find($id);
        return $this->view('basic.permission.show', compact('model'));
    }


    public function edit($id)
    {
        $model = $this->model->find($id);
        return $this->view('basic.permission.edit', compact('model'));
    }


    public function update(PermissionRequest $request, $id)
    {
        $model = $this->model->find($id);

        if ($model->update($request->except('_token'))) {
            return $this->success();
        }
        return $this->error();
    }


    public function destroy($id)
    {
        $model = $this->model->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }

}
