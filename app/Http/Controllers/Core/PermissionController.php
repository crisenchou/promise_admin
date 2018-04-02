<?php

namespace App\Http\Controllers\Core;

use App\Http\Requests\PermissionRequest;
use App\Permission;
use App\Repositories\PermissionRepository;

class PermissionController extends AbstractCoreController
{

    protected $permission;
    public $title = '权限管理';


    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }



    public function index()
    {
        $list = $this->model->all();
        return $this->view('core.permission.index', compact('list'));
    }


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
        return $this->view('core.permission.show', compact('model'));
    }


    public function edit($id)
    {
        $model = $this->model->find($id);
        return $this->view('core.permission.edit', compact('model'));
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
