<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    protected $render = [];


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function view($view, $render = [])
    {
        return view($view, array_merge($this->render, $render));
    }

    protected function redirect($url)
    {
        return redirect($url);
    }


    protected function response($response)
    {
        return response($response);
    }

    protected function message($type, $message)
    {
        return $this->view('message.' . $type, $message);
    }

    protected function success($message)
    {
        return $this->message('success', $message);
    }

    protected function info($message)
    {
        return $this->message('info', $message);
    }

    protected function error($message)
    {
        return $this->message('error', $message);
    }

    protected function warning($message)
    {
        return $this->message('warning', $message);
    }


}
