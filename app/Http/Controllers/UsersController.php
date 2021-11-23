<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
        /////////////////////////////////
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

            $validated = $request->validate([
                'name' => 'bail|required|max:255',
                'user' => 'bail|required|max:255',
                'pass' => 'bail|required|max:255',
            ]);
            dd("o");
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->user;
            $user->password = $request->pass;
            $user->save();



        }else {
            return view('Authentication.signIn');
        }
    }
}
