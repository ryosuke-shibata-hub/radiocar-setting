<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User\User;
use App\Models\Setting\MySetting;

use Log;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->logoPath = config('const.USER.ACCOUNTLOGO.DIRPATH.PATH');
    }

    public function userPage(Request $request)
    {
        $targetUser = User::findUserToUserId($request);
        $settingList = MySetting::SettingList($request);

        return view('contents.user_page')
        ->with('targetUser', $targetUser)
        ->with('settingList', $settingList);
    }

    public function accountSetting(Request $request)
    {
        if (Auth::check()) {
            return view('contents.usersetting_page');
        }

        return redirect('return redirect/rc-setting/error/401');
    }

    public function updateAccountData(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'accountName' => ['bail', 'required', 'string', 'max:16'],
            'targetAccountId' => ['bail', 'required', 'string'],
            'email' => ['bail', 'required', 'email'],
            'profileComment' => ['bail','max:200',],
            'account_img' => ['bail','image','max:5000'],
        ]);

        if ($validator->fails()) {
            return redirect('/rc-setting/mypage/account/setting')
            ->with('err_message','アカウントの更新内容に不備があります。');
        }

        try {

            $requestImg = $request->file('account_img');

            if ($requestImg) {
                $updateLogo = '/'.$requestImg->store($this->logoPath,'public');
            } else {
                $updateLogo = Auth::user()->account_logo;
            }

            $targetData = [
                'accountName' => $request->accountName,
                'accountId' => $request->targetAccountId,
                'accountEmail' => $request->email,
                'profileComment' => $request->profileComment,
                'account_img' => $updateLogo,
                'targetAuthUser' => Auth::user()->account_uuid,
                'accountUpdateRoute' => 1,
            ];

            $checkUniqueUser = User::checkUniqueUser($targetData);

            if ($checkUniqueUser !== null) {
                return redirect('/rc-setting/mypage/account/setting')
                ->with('err_message','このアカウント名またはメールアドレスは使用できません。');
            }

            DB::beginTransaction();

            $updateAccount = User::updateProfile($targetData);

            DB::commit();

            return redirect('/rc-setting/mypage/account/setting')
            ->with('succsess_message', 'アカウント情報を更新しました。');

        } catch (\Throwable $th) {
            Log::error('アカウント更新処理で例外処理発生',[$th]);
            return redirect('/rc-setting/mypage/account/setting')
            ->with('err_message','アカウントの更新処理に失敗しました。再度お試しください。');
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'current_password' => [
                'regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]{8,100}+\z/i','string','bail','required','current_password'],
            'new_password' => [
                'regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]{8,100}+\z/i','string','bail','required'],
            'new_password_confirm' => [
                'regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]{8,100}+\z/i','string','bail','required','same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect('/rc-setting/mypage/account/setting')
            // ->with('err_message_password','err_message_password')
            ->withErrors($validator)
            ->withInput();
        }

        try {

            $targetData = [
                'accountId' => $request->targetAccountId,
                'targetAuthUser' => Auth::user()->account_uuid,
                'newPassword' => $request->new_password,
                'accountUpdateRoute' => 2,
            ];

            DB::beginTransaction();

            $updatePassword = User::updateProfile($targetData);

            DB::commit();

            return redirect('/rc-setting/mypage/account/setting')
            ->with('succsess_message', 'アカウントパスワードを更新しました。');
        } catch (\Throwable $th) {
            Log::error('パスワード更新処理で例外処理発生',[$th]);
            return redirect('/rc-setting/mypage/account/setting')
            ->with('err_message','パスワードの更新処理に失敗しました。再度お試しください。');
        }
    }

    public function deleteAccount(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'targetAccountId' => ['bail', 'required', 'string'],
        ]);

        if ($validator->fails()) {
            Log::error("アカウント削除でアカウントIDがない",[$request]);
            return redirect('/rc-setting/error/500');
        }

        try {

            $targetData = [
                'accountId' => $request->targetAccountId,
                'targetAuthUser' => Auth::user()->account_uuid,
                'accountUpdateRoute' => 3,
            ];

            DB::beginTransaction();

            $deleteUser =  User::updateProfile($targetData);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            DB::commit();

            return redirect('/rc-setting/login')
            ->with('succsess_message', 'アカウントの削除が完了しました。');

        } catch (\Throwable $th) {
            Log::error('アカウント削除処理で例外処理発生',[$th]);
            return redirect('/rc-setting/mypage/account/setting')
            ->with('err_message','アカウントの削除処理に失敗しました。再度お試しください。');
        }
    }
}
