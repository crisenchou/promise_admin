<?php

namespace App\Http\Controllers\Basic;

use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    public static function model()
    {
        return MenuRepository::class;
    }

    public function index()
    {
        $menus = $this->model->all();
        return $this->view('menus.index', ['menus' => $menus]);
    }
}