<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Log;
class MySetting extends Model
{
    use HasFactory;

    protected $table = 'rc_setting';

    public $timestamps = false;

    protected $dates = [
        'create_date',
        'update_date',
    ];


    public static function SettingList($request)
    {
        $user_delete_flg = config('const.USER.DELETE_FLG.ACTIVE');
        $setting_delete_flg = config('const.RCSETTING.DELETE_FLG.ACTIVE');
        $publish_setting_flg = config('const.RCSETTING.PUBLISHSETTING.PUBLIC');
        $account_id = $request->account_id;
        $searchKeyword = $request->search;
        $tag = $request->tag;

        $data = MySetting::where('rc_setting.delete_flg', $setting_delete_flg)
        ->join('users','rc_setting.account_uuid','=','users.account_uuid')
        ->where('users.delete_flg',$user_delete_flg)
        //トップページ（公開範囲は全公開のみ）
        ->when(empty($account_id) && empty($account_id), function($query) use ($publish_setting_flg) {
            return $query->where('rc_setting.publish_setting_flg', '=', $publish_setting_flg);
        })
        //ユーザーページ（認証ユーザー以外はそのユーザーの公開設定のものを表示）
        ->when(!empty($account_id) && !Auth::check(), function($query) use ($publish_setting_flg, $account_id) {
            return $query->where('rc_setting.publish_setting_flg', '=', $publish_setting_flg)
                ->where('users.account_id', '=', $account_id);
        })
        //ユーザーページ（認証ユーザーが自分のページ見てたら全て表示）
        ->when(!empty($account_id) && Auth::check() && Auth::user()->account_id == $account_id, function($query) use ($account_id) {
            return $query->where('users.account_id', '=', $account_id);
        })
        //ユーザーページ（認証ユーザーが自分のページ見てたら全て表示）
        ->when(!empty($account_id) && Auth::check() && Auth::user()->account_id != $account_id, function($query) use ($account_id,$publish_setting_flg) {
            return $query->where('users.account_id', '=', $account_id)
                ->where('rc_setting.publish_setting_flg', '=', $publish_setting_flg);
        })
        ->orderBy('rc_setting.update_date', 'desc');

        if ($searchKeyword) {
            $data = $data
            ->where(function($query) use($searchKeyword) {
                $query->orwhere('rc_setting.chassis','like','%'. $searchKeyword . '%')
                    ->orWhere('rc_setting.driving_scene','like','%'. $searchKeyword . '%')
                    ->orWhere('rc_setting.transmitter','like','%'. $searchKeyword . '%');
            });
        }

        if ($tag) {
            $data = $data
            ->where('rc_setting.genre', '=', $tag);
        }

        return $data->get();
    }

    public static function searchSetting($searchKeyword)
    {
        $user_delete_flg = config('const.USER.DELETE_FLG.ACTIVE');
        $setting_delete_flg = config('const.RCSETTING.DELETE_FLG.ACTIVE');
        $publish_setting_flg = config('const.RCSETTING.PUBLISHSETTING.PUBLIC');

        $data = MySetting::where('rc_setting.delete_flg', $setting_delete_flg)
        ->where('rc_setting.publish_setting_flg', '=', $publish_setting_flg)
        ->leftjoin('users','rc_setting.account_uuid','=','users.account_uuid')
        ->where('users.delete_flg',$user_delete_flg);



        return $data->get();
    }
    public static function storeMySetting($storeSettingtData)
    {
        $delete_flg = config('const.RCSETTING.DELETE_FLG.ACTIVE');

        $storeData = new MySetting();
        $storeData->setting_id = (string) Str::uuid();
        $storeData->account_uuid = $storeSettingtData['targetAuthUser'];
        $storeData->driving_scene = $storeSettingtData['corse'];
        $storeData->genre = $storeSettingtData['genre'];
        $storeData->chassis = $storeSettingtData['chassis'];
        $storeData->body = $storeSettingtData['body'];
        $storeData->transmitter = $storeSettingtData['transmitter'];
        $storeData->amp = $storeSettingtData['amp'];
        $storeData->servo = $storeSettingtData['servo'];
        $storeData->gyro = $storeSettingtData['gyro'];
        $storeData->motor = $storeSettingtData['motor'];
        $storeData->camber_f = $storeSettingtData['camber_f'];
        $storeData->camber_r = $storeSettingtData['camber_r'];
        $storeData->toe_f = $storeSettingtData['toe_f'];
        $storeData->toe_r = $storeSettingtData['toe_r'];
        $storeData->height_f = $storeSettingtData['height_f'];
        $storeData->height_r = $storeSettingtData['height_r'];
        $storeData->caster_f = $storeSettingtData['caster_f'];
        $storeData->caster_r = $storeSettingtData['caster_r'];
        $storeData->spur_gear = $storeSettingtData['spur_gear'];
        $storeData->pinion_gear = $storeSettingtData['pinion_gear'];
        $storeData->shock = $storeSettingtData['shock'];
        $storeData->oil_f = $storeSettingtData['oil_f'];
        $storeData->oil_r = $storeSettingtData['oil_r'];
        $storeData->spring_f = $storeSettingtData['spring_f'];
        $storeData->spring_r = $storeSettingtData['spring_r'];
        $storeData->piston_f = $storeSettingtData['piston_f'];
        $storeData->piston_r = $storeSettingtData['piston_r'];
        $storeData->other_1 = $storeSettingtData['other_1'];
        $storeData->other_2 = $storeSettingtData['other_2'];
        $storeData->other_3 = $storeSettingtData['other_3'];
        $storeData->memo = $storeSettingtData['memo'];
        $storeData->publish_setting_flg = $storeSettingtData['publish_setting_flg'];
        $storeData->image_1 = $storeSettingtData['setting_image'];
        $storeData->delete_flg = $delete_flg;
        $storeData->create_date = now();
        $storeData->update_date = now();
        $storeData->save();

        return $storeData;
    }

    public static function SettingDetail($setting_id)
    {
        $user_delete_flg = config('const.USER.DELETE_FLG.ACTIVE');
        $setting_delete_flg = config('const.RCSETTING.DELETE_FLG.ACTIVE');
        $publish_setting_flg = config('const.RCSETTING.PUBLISHSETTING.PUBLIC');

        $data = MySetting::where('rc_setting.setting_id',$setting_id)
        ->where('rc_setting.delete_flg',$setting_delete_flg)
        ->join('users','rc_setting.account_uuid','=','users.account_uuid')
        ->where('users.delete_flg',$user_delete_flg);
        if (Auth::check()) {
            //認証ユーザーだったらIDをチェック
            $auth_user_account_uuid = Auth::user()->account_uuid;
            $data->where(function($query)use($auth_user_account_uuid, $publish_setting_flg){
                //投稿したユーザーが認証ユーザーじゃなかったら公開設定のみ表示
                $query->where('users.account_uuid', $auth_user_account_uuid)
                    ->orWhere('rc_setting.publish_setting_flg', $publish_setting_flg);
            });
        } else {
            //未認証ユーザーだったら公開設定のみ表示
            $data->where('rc_setting.publish_setting_flg', $publish_setting_flg);
        }

        return $data->first();
    }

}