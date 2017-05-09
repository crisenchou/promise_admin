<?php

namespace App\Http\Controllers\Basic;

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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->role->all();
        return $this->view('common.index', ['list' => $list]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('common.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($this->role->create($request->except('_token'))) {
            return $this->success();
        } else {
            return $this->error();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->role->find($id);
        return $this->view('common.show', ['model' => $model]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->role->find($id);
        return $this->view('common.edit', ['model' => $model]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = $this->role->find($id);
        if ($model->update($request->except('_token'))) {
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
        $role = $this->role->find($id);
        if ($role->delete()) {
            return $this->success();
        }
        return $this->error();
    }

}
