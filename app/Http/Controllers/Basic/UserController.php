<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserController extends AbstractBasicController
{
    protected $title = '用户管理';
    protected $view = 'user';

    protected function title()
    {
        return '用户管理';
    }

    protected function viewPath()
    {
        return 'user';
    }

    public static function model()
    {
        return UserRepository::class;
    }

    public function init()
    {
        $roles = app()->make(RoleRepository::class)->all();
        $this->render['roles'] = $this->createMap($roles);
        parent::init();
    }


    /**
     * create the mapArr
     * @param $collection
     * @return mixed
     */
    private function createMap(Collection $collection)
    {
        $flattened = $collection->mapWithKeys(function ($values) {
            return [$values->id => $values->name];
        });
        return $flattened->all();
    }


    public function store(Request $request)
    {
        $model = $this->model->create($request->except('_token'));
        if ($model) {
            $model->roles()->attach($request->get('role_id'));
            return $this->success();
        }
        return $this->error();
    }


    public function update(Request $request, $id)
    {
        $user = $this->model->find($id);
        if ($user->update($request->except('_token'))) {
            $user->roles()->detach();
            $user->roles()->attach($request->get('role_id'));
            return $this->success();
        }
        return $this->error();
    }

}