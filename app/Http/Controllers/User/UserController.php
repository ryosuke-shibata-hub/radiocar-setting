<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User\User;

use Log;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->logoPath = config('const.USER.ACCOUNTLOGO.DIRPATH.PATH');
    }

    public function userPage($id)
    {
        $targetUser = User::findUserToUserId($id);

        return view('contents.user_page')
        ->with('targetUser', $targetUser);
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
            $updateAccountData = [
                'accountName' => $request->accountName,
                'accountId' => $request->targetAccountId,
                'accountEmail' => $request->email,
                'profileComment' => $request->profileComment,
                'account_img' => $request->account_img,
            ];

            $targetAuthUser = Auth::user()->account_uuid;

            $checkUniqueUser = User::checkUniqueUser($updateAccountData, $targetAuthUser);

            // dd($checkUniqueUser);
            if ($checkUniqueUser !== null) {
                return redirect('/rc-setting/mypage/account/setting')
                ->with('err_message','このアカウント名またはメールアドレスは使用できません。');
            }
            $requestImg = $request->file('account_img');

            if ($requestImg) {
                $updateLogo = '/'.$requestImg->store($this->logoPath,'public');
            } else {
                $updateLogo = Auth::user()->account_logo;
            }

            DB::beginTransaction();

            $updateAccount = User::updateProfile($updateAccountData, $targetAuthUser, $updateLogo);

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
        # code...
    }

    public function deleteAccount(Request $request)
    {
        # code...
    }
}
