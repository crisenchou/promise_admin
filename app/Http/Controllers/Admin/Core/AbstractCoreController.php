<?php

namespace App\Http\Controllers\Admin\Core;


use App\Http\Controllers\Admin\AdminController;


class AbstractCoreController extends AdminController
{


    protected $title;
    protected $model;
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


    public function getFields()
    {
        if (method_exists($this, 'fields')) {
            return $this->fields();
        }
        return property_exists($this, 'fields') ? $this->fields : '';
    }


    protected function init()
    {
        $this->render['title'] = $this->getTitle();
        $this->render['route'] = $this->getRoute();
    }

}
