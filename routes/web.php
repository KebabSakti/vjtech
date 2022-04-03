<?php

use App\Http\Controllers\AdminImagesController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPortfolioController;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketerController;
use App\Http\Controllers\ReferralController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('referral/{phone?}', [ReferralController::class, 'referral'])->name('referral');

//admin route
Route::get('login', [AdminLoginController::class, 'loginForm'])->name('login.form');
Route::post('login', [AdminLoginController::class, 'loginGo'])->name('login.go');
Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

//FCM
Route::group(['prefix' => 'fcm'], function () {
    Route::post('subscribe', [FcmController::class, 'subscribeToTopic'])->name('fcm.subscribe');
    Route::post('send', [FcmController::class, 'sendNotification'])->name('fcm.send');
});

Route::group(['prefix' => 'admin', 'middleware' => 'user.admin'], function () {
    Route::resource('portfolio', AdminPortfolioController::class)->only(['index', 'store', 'create', 'destroy', 'edit', 'update']);
    Route::resource('marketer', MarketerController::class);
    Route::get('client', [ReferralController::class, 'client'])->name('client.index');
    Route::get('images/{id}/gallery', [AdminImagesController::class])->name('images');
});
