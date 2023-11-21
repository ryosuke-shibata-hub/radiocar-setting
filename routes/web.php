<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Top\TopController;
use App\Http\Controllers\Auth\LoginController;
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

    Route::get('/login', [LoginController::class, 'login'])
    ->name('login');

    Route::get('/top', [TopController::class, 'topPage'])
    ->name('topPage');

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
