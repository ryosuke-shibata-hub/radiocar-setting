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

        return view('contents.top_page')
        ->with('settingList', $settingList);
    }
}
