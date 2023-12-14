<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public $timestamps = false;

    protected $dates = [
        'create_date',
        'update_date',
    ];


    public static function storeAccount($storeAccountData)
    {
        $delete_flg = config('const.USER.DELETE_FLG.ACTIVE');
        $defaultLogo = config('const.USER.ACCOUNTLOGO.LOGO.DEFAULT');

        $data = new User;
        $data->account_uuid = (string) Str::uuid();
        $data->account_id = $storeAccountData['accountId'];
        $data->account_name = $storeAccountData['accountName'];
        $data->email = $storeAccountData['accountEmail'];
        $data->password = Hash::make($storeAccountData['accountPassword']);
        $data->account_logo = $defaultLogo;
        $data->delete_flg = $delete_flg;
        $data->create_date = now();
        $data->update_date = now();
        $data->save();

        return $data;

    }

    public static function checkUniqueUser($updateAccountData)
    {
        $delete_flg = config('const.USER.DELETE_FLG.ACTIVE');

        //アカウントネームとメールアドレスの重複チェック（自分以外のアカウント）
        $checkUniqueUser = User::where(function ($query) use ($updateAccountData) {
            $query->where('account_name', $updateAccountData['accountName'])
            ->orWhere('email', $updateAccountData['accountEmail']);
        })
        ->where('delete_flg', $delete_flg)
        ->where('account_uuid', '<>', $updateAccountData['targetAuthUser'])
        ->first();

        return $checkUniqueUser;
    }

    public static function findUserToUserId($request)
    {
        $delete_flg = config('const.USER.DELETE_FLG.ACTIVE');
        $account_id = $request->account_id;

        $result = User::where('account_id', $account_id)
        ->where('delete_flg', $delete_flg)
        ->first();

        return $result;
    }

    public static function updateProfile($targetData)
    {
        $delete_flg = config('const.USER.DELETE_FLG.ACTIVE');

        $targetUser = User::where('account_id', $targetData['accountId'])
        ->where('account_uuid', $targetData['targetAuthUser'])
        ->where('delete_flg', $delete_flg)
        ->first();

        if ($targetData['accountUpdateRoute'] === 1) {
            $targetUpdateAccount = $targetUser;
            $targetUpdateAccount->account_name = $targetData['accountName'];
            $targetUpdateAccount->email = $targetData['accountEmail'];
            $targetUpdateAccount->comment = $targetData['profileComment'];
            $targetUpdateAccount->account_logo = $targetData['account_img'];
            $targetUpdateAccount->update_date = now();
            $targetUpdateAccount->save();

            return $targetUpdateAccount;
        }

        if ($targetData['accountUpdateRoute'] === 2) {
            $targetUpdateAccount = $targetUser;
            $targetUpdateAccount->password = Hash::make($targetData['newPassword']);
            $targetUpdateAccount->update_date = now();
            $targetUpdateAccount->save();

            return $targetUpdateAccount;
        }

        if ($targetData['accountUpdateRoute'] === 3) {
            $targetUpdateAccount = $targetUser;
            $targetUpdateAccount->delete_flg = config('const.USER.DELETE_FLG.DISABLED');
            $targetUpdateAccount->update_date = now();
            $targetUpdateAccount->save();

            return $targetUpdateAccount;
        }
    }

    public static function SettingList($id)
    {
        $user_delete_flg = config('const.USER.DELETE_FLG.ACTIVE');
        $setting_delete_flg = config('const.RCSETTING.DELETE_FLG.ACTIVE');

        $data = User::where('users.account_id', $id)
        ->where('users.delete_flg', $user_delete_flg)
        ->join('rc_setting','users.account_uuid','=','rc_setting.account_uuid')
        ->where('rc_setting.delete_flg',$setting_delete_flg)
        ->orderBy('rc_setting.update_date','desc')
        ->get();

        return $data;
    }
}
