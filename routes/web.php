<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Top\TopController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Setting\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/rc-setting')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    //ログイン画面・処理
    Route::get('/login', [LoginController::class, 'login'])
    ->name('login');
    Route::post('/login/prosess', [LoginController::class, 'loginProsess'])
    ->name('loginProsess');

    // 会員登録画面・処理
    Route::get('/register', [RegisterController::class, 'register'])
    ->name('register');
    Route::post('/register/store-account', [RegisterController::class, 'storeAccount'])
    ->name('storeAccount');
    //トップページ画面
    Route::get('/top', [TopController::class, 'topPage'])
    ->name('topPage');
    //セッティングの詳細画面
    Route::get('/setting/{setting_id}', [SettingController::class, 'viewSetting'])
    ->name('viewSetting');
    //ユーザーページ
    Route::get('/userpage', [UserController::class, 'userPage'])
    ->name('userPage');
    //認証ルート
    Route::middleware('auth')->group(function () {
        //ログアウト処理
        Route::post('/logout/prosess', [LoginController::class, 'logoutProsess'])
        ->name('logoutProsess');
        //アカウント情報ページ
        Route::get('/mypage/account/setting', [UserController::class, 'accountSetting'])
        ->name('accountSetting');
        //アカウント情報編集
        Route::post('/user/update/account_data', [UserController::class, 'updateAccountData'])
        ->name('updateAccountData');
        //パスワード変更
        Route::post('/user/update/password', [UserController::class, 'updatePassword'])
        ->name('updatePassword');
        //アカウント削除
        Route::POST('/user/delete', [UserController::class, 'deleteAccount'])
        ->name('deleteAccount');
        //セッティングの投稿画面
        Route::get('/create/setting/mysetting', [SettingController::class, 'createMySetting'])
        ->name('storeMySetting');
        //セッティングの投稿処理
        Route::post('/store/setting/mysetting', [SettingController::class, 'storeMySetting'])
        ->name('storeMySetting');
        //セッティングの削除
        Route::post('/setting/delete', [SettingController::class, 'deleteMySetting'])
        ->name('deleteMySetting');
        //セッティングの編集
        Route::get('/setting/edit/{settingId}',[SettingController::class, 'editMySetting'])
        ->name('editMySetting');
    });
    // Route::get('/', [TopPage::class, 'welcome'])->name('welcome');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });
});

// require __DIR__.'/auth.php';
