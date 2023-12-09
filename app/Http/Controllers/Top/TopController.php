<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting\MySetting;
class TopController extends Controller
{
    public function topPage()
    {
        $publish_flg = config('const.RCSETTING.PUBLISHSETTING.PUBLIC');
        $settingList = MySetting::SettingList($publish_flg);

        return view('contents.top_page')
        ->with('settingList', $settingList);
    }
}
