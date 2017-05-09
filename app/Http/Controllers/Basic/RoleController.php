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

    protected function fields()
    {
        return [
            'name' => 'bsText',
            'description' => 'bsText'
        ];
    }

    public function index()
    {
        $list = $this->role->all();
        return $this->view('common.index', ['list' => $list]);
    }


    public function create()
    {
        return $this->view('common.create');
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
        return $this->view('common.show', ['model' => $model]);
    }


    public function edit($id)
    {
        $model = $this->role->find($id);
        return $this->view('common.edit', ['model' => $model]);
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
