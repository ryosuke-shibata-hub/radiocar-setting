<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting\MySetting;
class TopController extends Controller
{
    public function topPage()
    {
        $settingList = MySetting::SettingList();
        dd($settingList);
        return view('contents.top_page');
    }
}
