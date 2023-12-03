<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class SettingController extends Controller
{
    public function editMySetting()
    {
        return vieW('contents.edit_setting');
    }

    public function storeMySetting(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'corse' => ['string','bail','required'],
            'genre' => ['string','bail','required'],
            'chassis' => ['string','bail','required'],
            'transmitter' => ['string','bail','required'],
            'amp' => ['string','bail','required'],
            'servo' => ['string','bail','required'],
            'gyro' => ['string','bail','required'],
            'motor' => ['string','bail','required'],
            'camber_f' => ['string','bail','required'],
            'camber_r' => ['string','bail','required'],
            'toe_f' => ['string','bail','required'],
            'toe_r' => ['string','bail','required'],
            'height_f' => ['string','bail','required'],
            'height_r' => ['string','bail','required'],
            'caster_f' => ['string','bail','required'],
            'caster_r' => ['string','bail','required'],
            'spur_gear' => ['string','bail','required'],
            'pinion_gear' => ['string','bail','required'],
            'shock' => ['string','bail','required'],
            'oil_f' => ['string','bail','required'],
            'oil_r' => ['string','bail','required'],
            'spring_f' => ['string','bail','required'],
            'spring_r' => ['string','bail','required'],
            'piston_f' => ['string','bail','required'],
            'piston_r' => ['string','bail','required'],
            'other_1' => ['string','bail','required'],
            'other_2' => ['string','bail','required'],
            'other_3' => ['string','bail','required'],
            'memo' => ['string','bail','required'],
            'publish_setting' => ['string','bail','required'],
            'files.*.upload_image'  => ['bail','required','image','max:5000'],
            'files' => ['bail','required','max:5000'],
        ]);

        if ($validator->fails()) {
            return redirect('/rc-setting/store/setting/edit/mysetting')
            ->with('err_message_password','err_message_password')
            ->withErrors($validator)
            ->withInput();
        }
    }
}
