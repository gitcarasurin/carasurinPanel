<?php

namespace App\Http\Controllers;

use App\Models\Legals;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidationMail;
use App\Models\Gov;
use App\Models\LegalsCommercial;
use App\Models\LegalsNonCom;
use App\Models\RealForeign;
use App\Models\RealIr;
use App\Models\Token;
use App\Notifications\Sms;


class UsersController extends Controller
{
    public function login(Request $request)
    {


        // dd(Hash::check('plain-text', bcrypt('plain-text')));
        // hash


        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'username' => 'bail|required|max:255',
                'pass' => 'bail|required|max:255',
            ]);
            // $validator->errors()->add('field', 'Something is wrong with this field!');


        $user = User::
        where('username',$request->username)
        ->get();
        if(!isset($user[0])){
            return redirect('login?userno');
                exit;
        }

        if ($user[0]['phone_status'] == 'confirmed') {
            if (Hash::check($request->pass, $user[0]['pass'])){

                // rand
                $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                .'abcdefghijklmnopqrstuvwxyz'
                .'*/-!@#$%^&*+=-'
                .'0123456789');
                shuffle($seed);
                $token ='';
                foreach (array_rand($seed, 75) as $k) $token .= $seed[$k];
                session()->put('token',$token);


                $tokentb=Token::where('user_id',$user[0]['id'])->get();
                if (isset($tokentb[0])) {
                    $tokentb=Token::where('user_id',$user[0]['id'])
                    ->update([
                        'token'=>$token,
                    ]);
                }else {
                    $tokentb = new Token;
                    $tokentb->user_id=$user[0]['id'];
                    $tokentb->token =$token;
                    $tokentb->destroy = now()->addDays(3);
                    $tokentb->save();
                }
                session()->put('email',$user[0]['email']);

                return redirect('/');

            }else{
                return redirect('login?passno');
            }
        }else{
            session()->put('email',$user[0]['email']);
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
                'phone' => 'bail|required|max:255',
                'username' => 'required|unique:users,username|regex:/^\S*$/u',
                'email'=> 'required|unique:users,username|email:rfc,dns',
                'pass' => 'bail|required|min:8',
                'tab'=> 'required',
                'representative_nationality'=> 'required | in:real_ir,real_foreign',

            ]);

            $tab = $request->tab;
            // dd($tab);
            $rand_code = rand(10000,99999);

            // dd($request->phone);

            if ($tab =='real_ir') {
                $user = new User;
                $user->character_type = "real";
                $user->nationality = $request->representative_nationality;
                $user->phone = $request->phone;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone_status  = $rand_code;
                $user->pass = bcrypt($request->pass);
                $user->save();

                $realIr = new RealIr;
                $realIr->user_id = $user->id;
                $realIr->name = $request->name;
                $realIr->save();
            }
            elseif ($tab == 'real_foreign') {

                $user = new User;
                $user->character_type = $tab;
                $user->phone = $request->phone;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone_status  = $rand_code;
                $user->pass = bcrypt($request->pass);
                $user->save();


                $realIr = new RealForeign();
                $realIr->user_id = $user->id;
                $realIr->name = $request->name;
                $realIr->save();
            }
            elseif ($tab == 'commercial_law' || $tab =='legals_non_com' || $tab == 'governmental'){
                $validated = $request->validate([
                    'name_legal' => 'required | max:255',
                ]);


                $user = new User;
                $user->character_type = $tab;
                $user->phone = $request->phone;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone_status  = $rand_code;
                $user->pass = bcrypt($request->pass);
                $user->save();

                if ($tab == 'commercial_law') {
                    $organization = new LegalsCommercial;
                }
                if ($tab == 'legals_non_com') {
                    $organization = new LegalsNonCom;
                }
                if ($tab == 'governmental') {
                    $organization = new Gov;
                }
                $organization->user_id = $user->id;
                $organization->name = $request->name_legal;
                $organization->save();

                if ($request->representative_nationality == "real_ir") {
                    $realIr = new RealIr;
                    $realIr->user_id = $user->id;
                    $realIr->name = $request->name;
                    $realIr->save();

                }elseif ($request->representative_nationality ==  "real_foreign") {
                    $realIr = new RealForeign();
                    $realIr->user_id = $user->id;
                    $realIr->name = $request->name;
                    $realIr->save();
                }

                // dd("stop");
            }else{
                redirect('signIn');
            }

            $request->session()->flush();

            session()->put('email',$request->email);

            // Mail::send(new ValidationMail($rand_code));

            // send sms
            $user->notify(new Sms($rand_code,$request->phone));

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
                if($user[0]['phone_status'] == $request->code){
                    User::where('email',session('email'))->update(['phone_status' => "confirmed"]);


                    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                    .'abcdefghijklmnopqrstuvwxyz'
                    .'*/-!@#$%^&*+=-'
                    .'0123456789');
                    shuffle($seed);
                    $token ='';
                    foreach (array_rand($seed, 75) as $k) $token .= $seed[$k];
                    session()->put('token',$token);


                    $tokentb=Token::where('user_id',$user[0]['id'])->get();
                    if (isset($tokentb[0])) {
                        $tokentb=Token::where('user_id',$user[0]['id'])
                        ->update([
                            'token'=>$token,
                        ]);
                    }else {
                        $tokentb = new Token;
                        $tokentb->user_id=$user[0]['id'];
                        $tokentb->token =$token;
                        $tokentb->destroy = now()->addDays(3);
                        $tokentb->save();
                    }
                    return redirect('/');

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
        $rand_code = rand(10000,99999);

        $user = User::where('email',session('email'))->update(['phone_status' => $rand_code]);
        $user = User::where('email',session('email'))->get();
        $phone = $user[0]['phone'];

        $user = new User ;
        $user->notify(new Sms($rand_code,$phone));

        return Redirect('checkCode?resend');


    }

    public function logout(Request $request){
        Token::where('token',session('token'))->delete();
        $request->session()->flush();
        return redirect('login?out');

    }
}
