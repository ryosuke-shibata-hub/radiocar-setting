<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Log;
class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProsess(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => ['bail', 'required', 'email'],
            'password' => [
                'regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]{8,100}+\z/i','string','bail','required'],
        ]);
        if ($validator->fails()) {
            return redirect('/rc-setting/login')
            ->with('err_message','メールアドレスまたはパスワードが違います。');
        }

        try {
            $delete_flg = config('const.USER.DELETE_FLG.ACTIVE');

            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'delete_flg' => $delete_flg,
            ])) {
                $request->session()->regenerateToken();
                $request->session()->regenerate();

                Log::info("ログイン成功",[Auth::user()]);
                return redirect('/rc-setting/top');
            }

            return redirect('/rc-setting/login')->with('err_message','**メールアドレスまたはパスワードが違います。');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function logoutProsess(Request $request)
    {
        try {
            $logout_user = Auth::id();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            Log::info("ログアウト処理成功",[$logout_user]);
            return redirect('/rc-setting/login');

        } catch (\Throwable $th) {
            throw new Exception("ログアウト処理で例外発生",[$th]);
            Log::alert("ログアウト処理で例外発生",["エラーユーザー"=>$logout_user, $th]);
            return redirect('/rc-setting/error/500');
        }
    }
}
