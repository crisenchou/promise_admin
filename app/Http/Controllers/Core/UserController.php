<?php

namespace App\Http\Controllers\Core;

use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\CreateRequest;
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
        $roles = $this->role->all();
        $this->render['roles'] = $this->createMap($roles);
        $this->render['route'] = $this->route;
        parent::init();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->user->all();
        return $this->view('basic.user.index', compact('list'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('basic.user.create');
    }


    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->user->find($id);
        return $this->view('basic.user.show', compact('model'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->user->find($id);
        return $this->view('basic.user.edit', compact('model'));
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

    //处理密码
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


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        if ($user->delete()) {
            return $this->success();
        }
        return $this->error();
    }


}