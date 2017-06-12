<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;

class AdminController extends Controller
{


    protected $render = [];


    protected function init()
    {
    }

    protected function route()
    {
        $route = Route::currentRouteName();
        return substr($route, 0, strpos($route, '.'));
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
    protected function success($message = '保存成功')
    {
        return $this->message($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function error($message = '保存失败')
    {
        return $this->message($message);
    }
}
