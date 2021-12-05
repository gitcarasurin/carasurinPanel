<?php

use App\Http\Controllers\dashboardContriller;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\menuControlMidel;
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
Route::view('authentication', 'viewName');


Route::middleware([UserAuth::class,menuControlMidel::class])
->group(function () {
    Route::any('/', [dashboardContriller::class ,'dashboard']);
    Route::any('profile',[dashboardContriller::class , 'profile']);
    Route::any('personal_information', [dashboardContriller::class , 'personal_information']);
    // terminal
    Route::any('terminal', [TerminalController::class,'setup']);

    Route::any('mailCheckCode', [dashboardContriller::class,'mailCheckCode']);

});
