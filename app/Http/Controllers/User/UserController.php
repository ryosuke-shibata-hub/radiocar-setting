<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User\User;

class UserController extends Controller
{
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
        # code...
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
