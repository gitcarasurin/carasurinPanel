<?php

namespace App\Http\Controllers;

use App\Models\Legals;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidationMail;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function login(Request $request)
    {


        // dd(Hash::check('plain-text', bcrypt('plain-text')));
        // hash


        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'username' => 'bail|max:255',
                'pass' => 'bail|required|max:255',
            ]);
            // $validator->errors()->add('field', 'Something is wrong with this field!');


        $user = User::
        where('username',$request->username)
        ->leftjoin('legals','user_id','users.id')
        ->get();
        if(!isset($user[0])){
            return redirect('login?userno');
                exit;
        }
        // if () {
        //     # code...
        // }
        if ($user[0]['email_status'] == 'confirmed') {
            if (Hash::check($request->pass, $user[0]['password'])) {
                dd("ok");
            }else{
                return redirect('login?passno');
            }
        }else{
            return redirect('status?emailcodeno');
        }

        }else {
        return view('Authentication.login');

        }
    }

    public function signin(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name' => 'bail|required|max:255',
                'username' => 'required|unique:users,username|regex:/^\S*$/u',
                'email'=> 'required|unique:users,username|email:rfc,dns',
                'pass' => 'bail|required|min:8',
                'tab'=> 'required'
            ]);
            $tab = $request->tab;
            $rand_code = rand(1000,9999);

            if ($tab=='real') {
                $user = new User;
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->email_status = $rand_code;
                $user->password = bcrypt($request->pass);
                $user->save();
            }
            elseif ($tab = 'legal') {
                $user = new User;
                $user->name = $request->name;
                $user->character_type='legal';
                $user->username = $request->username;
                $user->email = $request->email;
                $user->email_status = $rand_code;
                $user->password = bcrypt($request->pass);
                $user->save();


                $legal = new Legals;
                $legal->user_id = $user->id;
                $legal->name=$request->legalName;
                $legal->save();
            }
            else{
                redirect('signIn');
            }

            session()->put('email',$request->email);
            Mail::send(new ValidationMail($rand_code));
            return Redirect('checkCode');

        }else {
            return view('Authentication.signIn');
        }


    }
    public function checkCode(Request $request)
    {
        if (session()->has('email')) {

            if ($request->isMethod("post")) {
                $user = User::where('email',session('email'))->get();
                if($user[0]['email_status'] == $request->code){
                    User::where('email',session('email'))->update(['email_status' => "confirmed"]);
                    dd("ok");
                }
                else{
                    return Redirect('checkCode?codeerr');
                }
            }else{
                return view('Authentication.checkCode');
            }

        }else{
            redirect('login');
        }
    }

    public function resendCode()
    {
        $rand_code = rand(1000,9999);

        User::where('email',session('email'))->update(['email_status' => $rand_code]);
        Mail::send(new ValidationMail($rand_code));
        return Redirect('checkCode?resend');


    }
}
