<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user();
        return view('home', ['user' => $user]);
    }

    public function user()
    {
        return Auth::user();
    }

    public function profile()
    {
        abort(404);
    }


    public function settings()
    {
        abort(500);
    }

}