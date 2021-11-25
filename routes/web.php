<?php

use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\UserAuth;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Route;








// Authentication
Route::any('signIn', [UsersController::class , 'signin']);
Route::any('login', [UsersController::class , 'login']);
Route::view('status', 'Authentication.status');
Route::any('checkCode', [UsersController::class ,'checkCode']);
Route::any('resendCode', [UsersController::class , 'resendCode']);
Route::view('mail', 'mail.code');
Route::any('logout',[UsersController::class,'logout']);

Route::middleware([UserAuth::class])
->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });

});
