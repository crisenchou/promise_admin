<?php

namespace App\Http\Controllers\Basic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Route;

abstract class AbstractBasicController extends Controller
{
    protected $render = [];
    protected $title;
    protected $model;
    protected $fields = [];
    protected $opration = [];
    protected $hidden = [];
    protected $viewPath = 'common';


    public function getTitle()
    {
        if (method_exists($this, 'title')) {
            return $this->title();
        }
        return property_exists($this, 'title') ? $this->title : 'home';
    }

    public function getViewPath()
    {
        if (method_exists($this, 'viewPath')) {
            return $this->viewPath();
        }
        return property_exists($this, 'viewPath') ? $this->viewPath : 'common';
    }


    public function getRoute()
    {
        if (method_exists($this, 'route')) {
            return $this->route();
        }
        return property_exists($this, 'route') ? $this->route : '';
    }

    protected function route()
    {
        $route = Route::currentRouteName();
        return substr($route, 0, strpos($route, '.'));
    }

    public function getFields()
    {
        if (method_exists($this, 'fields')) {
            return $this->fields();
        }
        return property_exists($this, 'fields') ? $this->fields : '';
    }

    public function __construct()
    {
        if (static::model()) {
            $this->model = app()->make(static::model());
        };
    }


    protected function init()
    {
        $this->render['title'] = $this->getTitle();
        $this->render['route'] = $this->getRoute();
        $this->render['fields'] = $this->getFields();
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($this->model->create($request->except('_token'))) {
            return $this->success();
        }
        return $this->error();
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $model = $this->model->find($id);
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
        $path = $this->getViewPath();
        if ($path) {
            $view = $path . '.' . $view;
        }
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


    /**
     * @param string $url
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function success($url = '')
    {
        return $this->redirect($url)->with(['message' => '保存成功']);
    }

    /**
     * @param string $url
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function error($url = '', $message = '保存失败')
    {
        return $this->redirect($url)->with(['message' => $message]);
    }

    /**
     * create the mapArr
     * @param $collection
     * @return mixed
     */
    protected function createMap(Collection $collection)
    {
        $flattened = $collection->mapWithKeys(function ($values) {
            return [$values->id => $values->name];
        });
        return $flattened->all();
    }
}
