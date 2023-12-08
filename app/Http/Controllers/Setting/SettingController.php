<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Setting\MySetting;

use Log;
class SettingController extends Controller
{
    public function viewSetting($setting_id)
    {
        try {
            $targetSetting = MySetting::viewSetting($setting_id);

            return view('contents.view_setting')
            ->with('targetSetting', $targetSetting);
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
    public function editMySetting()
    {
        return vieW('contents.edit_setting');
    }

    public function storeMySetting(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'targetAccountId' => ['string','bail', 'required'],
            'corse' => ['bail','required'],
            'genre' => ['bail','required'],
            'chassis' => ['bail','required'],
            'transmitter' => ['bail','required'],
            'amp' => ['bail'],
            'servo' => ['bail'],
            'gyro' => ['bail'],
            'motor' => ['bail'],
            'body' => ['bail'],
            'camber_f' => ['bail'],
            'camber_r' => ['bail'],
            'toe_f' => ['bail'],
            'toe_r' => ['bail'],
            'height_f' => ['bail'],
            'height_r' => ['bail'],
            'caster_f' => ['bail'],
            'caster_r' => ['bail'],
            'spur_gear' => ['bail'],
            'pinion_gear' => ['bail'],
            'shock' => ['bail'],
            'oil_f' => ['bail'],
            'oil_r' => ['bail'],
            'spring_f' => ['bail'],
            'spring_r' => ['bail'],
            'piston_f' => ['bail'],
            'piston_r' => ['bail'],
            'other_1' => ['bail'],
            'other_2' => ['bail'],
            'other_3' => ['bail'],
            'memo' => ['bail'],
            'publish_setting_flg' => ['bail','max:3','required'],
            'setting_image' => ['bail','image','max:5000'],
        ]);

        if ($validator->fails()) {
            return redirect('/rc-setting/store/setting/edit/mysetting')
            ->withErrors($validator)
            ->withInput();
        }
        $accountUuid = $request->targetAccountId;
        $authUuid = Auth::user()->account_uuid;

        if ($accountUuid !== $authUuid) {
            Log::alert("セッティングの登録で不正なリクエスト",['認証UUID',$authUuid,'リクエストUUID',$accountUuid]);
            return redirect('/rc-setting/error/400');
        }

        try {

            $requestImg = $request->file('setting_image');

            $updateLogo = null;

            if ($requestImg) {
                $updateLogo = '/'.$requestImg->store($this->settingImagePath,'public');
            }

            $storeSettingtData = [
                'targetAuthUser' => Auth::user()->account_uuid,
                'corse' => $request->corse,
                'genre' => $request->genre,
                'chassis' => $request->chassis,
                'transmitter' => $request->transmitter,
                'amp' => $request->amp,
                'servo' => $request->servo,
                'gyro' => $request->gyro,
                'motor' => $request->motor,
                'body' => $request->body,
                'camber_f' => $request->camber_f,
                'camber_r' => $request->camber_r,
                'toe_f' => $request->toe_f,
                'toe_r' => $request->toe_r,
                'height_f' => $request->height_f,
                'height_r' => $request->height_r,
                'caster_f' => $request->caster_f,
                'caster_r' => $request->caster_r,
                'spur_gear' => $request->supur_gear,
                'pinion_gear' => $request->pinion_gear,
                'shock' => $request->shock,
                'oil_f' => $request->oil_f,
                'oil_r' => $request->oil_r,
                'spring_f' => $request->spring_f,
                'spring_r' => $request->spring_r,
                'piston_f' => $request->piston_f,
                'piston_r' => $request->piston_r,
                'other_1' => $request->other_1,
                'other_2' => $request->other_2,
                'other_3' => $request->other_3,
                'memo' => $request->memo,
                'publish_setting_flg' => $request->publish_setting_flg,
                'setting_image' => $updateLogo,
            ];

            $storeMySetting = MySetting::storeMySetting($storeSettingtData);

            return redirect('/rc-setting/top')
            ->with('succsess_message','okまる');
        } catch (\Throwable $th) {
            Log::error('セッティングの登録で例外処理',[$th]);
            return redirect('/rc-setting/store/setting/edit/mysetting')
            ->with('err_message','セッティングの登録に失敗しました。再度登録してください。');
        }
    }
}
