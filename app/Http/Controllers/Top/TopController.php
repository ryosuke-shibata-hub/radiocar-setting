<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting\MySetting;
class TopController extends Controller
{
    public function topPage(Request $request)
    {
        $settingList = MySetting::SettingList($request);
        return view('contents.top_page')
        ->with('settingList', $settingList);
    }

    public function searchSetting(Request $request)
    {
        $searchKeyword = $request->search;
        $settingList = MySetting::searchSetting($searchKeyword);

        return view('contents.top_page')
        ->with('settingList', $settingList);
    }
}
