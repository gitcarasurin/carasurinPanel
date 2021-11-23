<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('dashboard.index');
});




// Authentication
Route::any('signIn', [UsersController::class , 'signin']);
Route::any('login', [UsersController::class , 'login']);
