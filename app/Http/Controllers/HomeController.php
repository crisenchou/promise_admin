<?php

namespace App\Http\Controllers;

use App\Mail\LoginShipped;
use Illuminate\Http\Request;
use Mail;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user();
        return $this->view('home', ['user' => $user]);
    }

    public function user()
    {
        return Auth::user();
    }

    public function profile()
    {
        return $this->message("coming soon");
    }


    public function settings()
    {
        return $this->message("coming soon");
    }

}