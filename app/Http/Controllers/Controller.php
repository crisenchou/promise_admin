<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Route;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


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
        return $this->redirect($url)->with(['message' => trans($message)]);
    }


    /**
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function success($message = 'success')
    {
        return $this->message($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function error($message = 'fail')
    {
        return $this->message($message);
    }

}
