<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $render = [];
    protected $model;
    protected $fillable = [];
    protected $opration = [];
    protected $hidden = [];
    protected $route = 'home';
    protected $module = '/';
    protected $view = 'common';
    protected $redirect = '/';


    public function __construct()
    {
        if (static::model()) {
            $this->model = app()->make(static::model());
        }
    }

    /**
     * static bind get model
     * @return null
     */
    public static function model()
    {
        return null;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->model->all();
        return $this->view('index', ['list' => $list]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model->create($request->except('_token'));
        return $this->success();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = $this->model->find($id);
        return $this->view('edit', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * render data
     * @param $view
     * @param array $render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view, $render = [])
    {
        $this->render();
        $view = $this->view . '.' . $view;
        return view($view, array_merge($this->render, $render));
    }

    /**
     * redirect
     * @param $url
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function redirect($url)
    {
        if (!$url) {
            $url = url($this->redirect);
        }
        return redirect($url);
    }


    /**
     * response
     * @param $response
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function response($response)
    {
        return response($response);
    }


    protected function render()
    {
        $this->render['fillable'] = $this->fillable;
        $this->render['opration'] = $this->opration;
        $this->render['module'] = $this->module;
        $this->render['route'] = $this->route;
        return $this->render;
    }


    protected function success($url = '')
    {
        return $this->redirect($url)->with(['message' => '保存成功']);
    }

    protected function error($url = '')
    {
        return $this->redirect($url)->with(['message' => '保存失败']);
    }

}
