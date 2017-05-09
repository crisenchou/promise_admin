<?php

namespace App\Http\Controllers\Basic;

use App\Menu;
use App\User;
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
    protected $upload = false;
    protected $route;


    public function getTitle()
    {
        if (method_exists($this, 'title')) {
            return $this->title();
        }
        return property_exists($this, 'title') ? $this->title : 'home';
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


    public function isUpload()
    {
        if (method_exists($this, 'upload')) {
            return $this->upload();
        }
        return property_exists($this, 'upload') ? $this->upload : '';
    }


    protected function init()
    {
        $this->render['title'] = $this->getTitle();
        $this->render['route'] = $this->getRoute();
        $this->render['fields'] = $this->getFields();
        $this->render['upload'] = $this->isUpload();
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
     * @param null $message
     * @param null $url
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function message($message = null, $url = null)
    {
        return $this->redirect($url)->with(['message' => $message]);
    }


    /**
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function success($message = '')
    {
        return $this->message(['message' => $message]);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function error($message = '保存失败')
    {
        return $this->message($message);
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
