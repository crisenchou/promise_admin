<?php

namespace App\Http\Controllers\Basic;

use App\Http\Requests\UserRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

class UserController extends AbstractBasicController
{

    protected $user;
    protected $role;
    public $title = '用户管理';

    public function __construct(UserRepository $user, RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function init()
    {
        $roles = $this->role->all();
        $this->render['roles'] = $this->createMap($roles);
        parent::init();
    }


    public function store(UserRequest $request)
    {
        $user = $this->user->create($request->except('_token'));
        if ($user) {
            $user->roles()->attach($request->get('role_id'));
            return $this->success();
        }
        return $this->error();
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->user->find($id);
        if ($user->update($request->except('_token'))) {
            $user->roles()->detach();
            $user->roles()->attach($request->get('role_id'));
            return $this->success();
        }
        return $this->error();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->user->all();
        return $this->view('basic.user.index', ['list' => $list]);
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
        return $this->view('basic.user.show', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->user->find($id);
        return $this->view('basic.user.edit', ['model' => $model]);
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