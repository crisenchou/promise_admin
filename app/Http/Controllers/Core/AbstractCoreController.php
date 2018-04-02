<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class AbstractCoreController extends Controller
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
    }
    
}
