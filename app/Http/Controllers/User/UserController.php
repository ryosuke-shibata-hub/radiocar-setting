<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userPage(Request $request)
    {
        return view('contents.userpage');
    }
}
