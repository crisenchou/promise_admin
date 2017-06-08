<?php

namespace App\Http\Controllers;

use App\UserInfo;
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
        return view('home.index', ['user' => $user]);
    }

    public function user()
    {
        return Auth::user();
    }

    public function profile()
    {
        $user = $this->user();
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        return view('home.profile', compact('userInfo'));
    }

    public function saveProfile(Request $request)
    {
        $user = $this->user();
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        if (!$userInfo) {
            $userInfo = new UserInfo();
        }
        $userInfo->gender = $request->get('gender');
        $userInfo->user_id = $user->id;
        $userInfo->save();
        return redirect('profile');
    }

    public function settings()
    {
        return view('home.settings');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);
        $user = $this->user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect('profile');
    }

}