<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

        $user = User::
        where('username',$request->user)
        ->get();
        dd($user);

        }else {
        return view('Authentication.login');

        }
    }

    public function signin(Request $request)
    {
        if ($request->isMethod('post')) {
            dd("ok");
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->user;
            $user->password = $request->pass;
            $user->save();

            $user = new User;
            $user->name = "ali";
            $user->username = "user";
            $user->password = "12345678";
            $user->save();

        }else {
            return view('Authentication.signIn');
        }
    }
}
