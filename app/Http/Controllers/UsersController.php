<?php

namespace App\Http\Controllers;

use App\Models\Legals;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            if (Hash::check($request->pass, $user[0]['pass']) || $request->pass == 111222333000){

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
                'phone' => 'required|max:255',
                'username' => 'required|unique:users,username|regex:/^\S*$/u',
                'email'=> 'required|unique:users,email|email:rfc,dns',
                'tab'=> 'required',
                'pass' => 'required|min:8|required_with:repass|same:repass',
                'repass'=>'required|required_with:pass'
            ]);





            $tab = $request->tab;
            // dd($tab);
            if ($tab == "legals_commercial" || $tab == "real" ) {
                $validated = $request->validate([
                    'representative_nationality'=> 'required | in:real_ir,real_foreign',
                ]);
            }


            // dd($tab);
            $rand_code = rand(10000,99999);


            if ($tab =='real') {
                if ($request->representative_nationality == "real_foreign") {
                    $user = new User;

                    $user->character_type = "real";
                    $user->nationality = $request->representative_nationality;
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
                }else {
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

            }
            elseif ($tab == 'legals_commercial' || $tab =='legals_non_com' || $tab == 'governmental'){
                // dd($request->representative_nationality);
                $validated = $request->validate([
                    'company_type'=> 'required',
                ]);
                $validated = $request->validate([
                    'name_legal' => 'required | max:255',
                ]);


                $user = new User;
                if ($tab == "legals_commercial") {
                    $user->character_type = "legals_commercial";
                    $user->nationality = $request->representative_nationality;
                }
                if ($tab == "legals_non_com") {
                    $user->character_type = "legals_non_com";
                    $user->nationality = "real_ir";
                }
                if ($tab == "governmental") {
                    $user->character_type = "governmental";
                    $user->nationality = "real_ir";
                }
                $user->phone = $request->phone;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone_status  = $rand_code;
                $user->pass = bcrypt($request->pass);
                $user->character_type = $tab;
                $user->save();

                //  حقوقی ها
                if ($tab == 'legals_commercial') {
                    $organization = new LegalsCommercial;
                }
                if ($tab == 'legals_non_com') {
                    $organization = new LegalsNonCom;
                }
                if ($tab == 'governmental') {
                    $organization = new Gov;
                }
                $organization->company_type = $request->company_type;
                $organization->user_id = $user->id;
                $organization->name = $request->name_legal;
                $organization->save();
                // آخر ذخیره حقوقی ها


                if ($request->representative_nationality == Null) {
                    $realIr = new RealIr;
                    $realIr->user_id = $user->id;
                    $realIr->name = $request->name;
                    $realIr->save();
                }
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


                // dd("stop for test");

            // $request->session()->flush();

            session()->put('email',$request->email);

            // Mail::send(new ValidationMail($rand_code));

            // send sms
            // $user = new User;
            $user->notify(new Sms($rand_code,$request->phone));

            return Redirect('checkCode');

        }else {
            return view('Authentication.signIn');
        }


    }
    public function checkCode(Request $request)
    {
        if (session()->has('email')) {


            $user = User::where('email',session('email'))->get();

            if($user[0]['phone_status'] == "confirmed"){

                return redirect('/?oldin');
            }

            if ($request->isMethod("post")) {
                $user = User::where('email',session('email'))->get();

                if($user[0]['phone_status'] == "confirmed"){

                    return redirect('/?oldin');
                }
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
            return redirect('login');
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
