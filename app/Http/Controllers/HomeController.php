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
        $user = Auth::user();
        Mail::to($user->email)
            ->queue(new LoginShipped($user));
        return response('ok');
        //return view('home');
    }
}
