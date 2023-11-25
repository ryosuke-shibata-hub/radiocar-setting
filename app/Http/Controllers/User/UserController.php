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

        return view('contents.userpage')
        ->with('targetUser', $targetUser);
    }
}
