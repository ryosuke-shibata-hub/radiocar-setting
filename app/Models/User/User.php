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

    public static function findUserToUserId($id)
    {
        $delete_flg = config('const.USER.DELETE_FLG.ACTIVE');

        $result = User::where('account_id', $id)
        ->where('delete_flg', $delete_flg)
        ->first();

        return $result;
    }
}
