<?php

namespace App\Http\Controllers;

use App\Repositories\TransactionRepository;
use App\UserInfo;
use Illuminate\Http\Request;
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
        return view('home.index', compact('user'));
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
        return $this->message('修改成功,请重新登陆', 'login');
    }


    public function settings()
    {
        $skin = config('app.skin');
        $openRegister = config('app.register');
        return view('home.settings', compact('skin', 'openRegister'));
    }

    public function saveSettings(Request $request)
    {
        $skin = $request->get('skin', 'no-skin');
        $openRegister = $request->get('register', 'false');
        $this->modifyEnv([
            'APP_SKIN' => $skin,
            'APP_OPEN_REGISTER' => $openRegister
        ]);
        return $this->success();
    }


    private function modifyEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';

        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));

        $contentArray->transform(function ($item) use ($data) {
            foreach ($data as $key => $value) {
                if (str_contains($item, $key)) {
                    return $key . '=' . $value;
                }
            }

            return $item;
        });

        $content = implode($contentArray->toArray(), "\n");

        \File::put($envPath, $content);
    }

}