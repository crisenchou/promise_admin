<?php

namespace App\Http\Controllers\Admin\Personal;

use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Auth;


class HomeController extends AdminController
{


    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user();
        return view('Admin.page.index', compact('user'));
    }

    protected function user()
    {
        return Auth::user();
    }


    public function profile()
    {
        $user = $this->user();
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        return view('home.profile.index', compact('userInfo'));
    }


    public function saveProfile(Request $request)
    {
        $user = $this->user();
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        if (!$userInfo) {
            $userInfo = new UserInfo();
        }
        $userInfo->gender = $request->get('gender');
        $userInfo->nickname = $request->get('nickname');
        $userInfo->age = $request->get('age');
        $userInfo->birthday = $request->get('birthday');
        $userInfo->comment = $request->get('comment');
        $userInfo->user_id = $user->id;
        $userInfo->save();
        return $this->success();
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);
        $user = $this->user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        Auth::logout();
        session()->flush();
        session()->regenerate();
        return $this->message('success', 'login');
    }


}