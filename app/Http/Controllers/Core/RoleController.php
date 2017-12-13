<?php

namespace App\Http\Controllers\Basic;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends AbstractBasicController
{

    protected $role;
    protected $title = '角色管理';

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $list = $this->role->all();
        return $this->view('basic.role.index', compact('list'));
    }


    public function create()
    {
        return $this->view('basic.role.create');
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
        return $this->view('basic.role.show', compact('model'));
    }


    public function edit($id)
    {
        $model = $this->role->find($id);
        return $this->view('basic.role.edit', compact('model'));
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
