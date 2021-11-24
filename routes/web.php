<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('dashboard.index');
});




// Authentication
Route::any('signIn', [UsersController::class , 'signin']);
Route::any('login', [UsersController::class , 'login']);
Route::view('status', 'Authentication.status');
Route::any('checkCode', [UsersController::class ,'checkCode']);
Route::any('resendCode', [UsersController::class , 'resendCode']);
Route::view('mail', 'mail.code');
