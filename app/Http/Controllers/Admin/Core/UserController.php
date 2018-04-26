<?php

namespace App\Http\Controllers\Admin\Core;

use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\StatusRequest;
use App\Role;
use App\User;


class UserController extends AbstractCoreController
{

    protected $user;
    protected $role;
    protected $route = 'user';
    public $title = '用户管理';

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function init()
    {
        $roles = $this->role->pluck('name', 'id');
        $this->render['roles'] = $roles;
        parent::init();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->user->all();
        return $this->view('core.user.index', compact('list'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('core.user.create');
    }


    public function show($id)
    {
        $model = $this->user->find($id);
        return $this->view('core.user.show', compact('model'));
    }


    public function edit($id)
    {
        $model = $this->user->find($id);
        return $this->view('core.user.edit', compact('model'));
    }


    public function store(CreateRequest $request)
    {
        $fillData = $this->encryptPassword($request->except('_token'));
        $user = $this->user->create($fillData);
        if ($user) {
            $user->roles()->attach($request->get('role_id'));
            return $this->success();
        }
        return $this->error();
    }


    private function encryptPassword($fillData)
    {
        if (!empty($fillData['password'])) {
            $fillData['password'] = bcrypt($fillData['password']);
        }
        return $fillData;
    }


    public function update(EditRequest $request, $id)
    {
        $user = $this->user->find($id);
        $fillData = $this->encryptPassword($request->except('_token'));
        if ($user->update($fillData)) {
            $user->roles()->detach();
            $user->roles()->attach($request->get('role_id'));
            return $this->success();
        }
        return $this->error();
    }


    public function destroy($id)
    {
        $user = $this->user->find($id);
        if ($user->delete()) {
            return $this->success();
        }
        return $this->error();
    }


    public function status(StatusRequest $request, $id)
    {
        $status = $request->get('status');
        $user = $this->user->find($id);
        if ($user->update(['status' => $status])) {
            return $this->success();
        }
        return $this->error();
    }

}