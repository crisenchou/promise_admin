<?php

namespace App\Http\Controllers\Core;

use App\Http\Requests\RoleRequest;
use App\Role;

class RoleController extends AbstractCoreController
{

    protected $role;
    protected $title = '角色管理';

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $list = $this->role->all();
        return $this->view('core.role.index', compact('list'));
    }


    public function create()
    {
        return $this->view('core.role.create');
    }


    public function store(RoleRequest $request)
    {
        if ($this->role->create($request->except('_token'))) {
            return $this->success();
        } else {
            return $this->error();
        }
    }


    public function show($id)
    {
        $model = $this->role->find($id);
        return $this->view('core.role.show', compact('model'));
    }


    public function edit($id)
    {
        $model = $this->role->find($id);
        return $this->view('core.role.edit', compact('model'));
    }

    public function update(RoleRequest $request, $id)
    {
        $model = $this->role->find($id);
        if ($model->update($request->except('_token'))) {
            return $this->success();
        }
        return $this->error();
    }


    public function destroy($id)
    {
        $role = $this->role->find($id);
        if ($role->delete()) {
            return $this->success();
        }
        return $this->error();
    }

}
