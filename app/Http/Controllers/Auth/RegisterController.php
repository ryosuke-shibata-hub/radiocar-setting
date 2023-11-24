<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

use Log;
use DB;
class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeAccount(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'accountName' => ['bail', 'required', 'string', 'max:16','unique:users,account_name'],
            'accountId' => ['bail', 'required', 'string', 'max:20','unique:users,account_id','regex:/^[a-zA-Z0-9-]+$/'],
            'email' => ['bail', 'required', 'email','unique:users,email'],
            'password' => [
                'regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]{8,100}+\z/i','string','bail','required'],
            'passwordConfirm' => [
                'bail','required','string','same:password'],
            'checkedPolicies' => ['bail','required'],
        ]);
        if ($validator->fails()) {
            return redirect('/rc-setting/register')
            ->with('err_message','アカウントの登録内容に不備があります。');
        }

        try {

            $storeAccountData = [
                'accountName' => $request->accountName,
                'accountId' => $request->accountId,
                'accountEmail' => $request->email,
                'accountPassword' => $request->password,
            ];

            DB::beginTransaction();

            $storeAccount = User::storeAccount($storeAccountData);

            DB::commit();

            return redirect('/rc-setting/register')
            ->with('accountName', $storeAccount->account_name);
        } catch (\Throwable $th) {
            Log::error("アカウント登録で例外エラー",[$th]);
            return redirect('/rc-setting/register')
            ->with('err_message','アカウントの登録に失敗しました。再度アカウント登録をお試しください。');
        }

    }
}
