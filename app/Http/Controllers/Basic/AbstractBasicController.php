<?php

namespace App\Http\Controllers\Basic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Route;

abstract class AbstractBasicController extends Controller
{
    protected $render = [];
    protected $title = 'dashboard';
    protected $model;
    protected $fillable = [];
    protected $opration = [];
    protected $hidden = [];
    protected $view = 'common';


    public function __construct()
    {
        if (static::model()) {
            $this->model = app()->make(static::model());
        }
        $this->render['fillable'] = $this->fillable;
        $this->render['opration'] = $this->opration;
        $route = $this->route();
        $this->render['route'] = $route;
        $this->render['title'] = $this->title;
    }

    protected function init()
    {

    }

    protected function route()
    {
        $route = Route::currentRouteName();
        return substr($route, 0, strpos($route, '.'));
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
        $model = $this->model->find($id);
        return $this->view('show', ['model' => $model]);
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
        $model = $this->model->find($id);
        if ($model->update($request->except('_token'))) {
            return $this->success();
        }
        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model->find($id);
        if ($model->delete()) {
            return $this->success();
        }
        return $this->error();
    }


    /**
     * render data
     * @param $view
     * @param array $render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view, $render = [])
    {
        $this->init();
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
            $url = url($this->route());
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


    protected function success($url = '')
    {
        return $this->redirect($url)->with(['message' => '保存成功']);
    }

    protected function error($url = '')
    {
        return $this->redirect($url)->with(['message' => '保存失败']);
    }
}
