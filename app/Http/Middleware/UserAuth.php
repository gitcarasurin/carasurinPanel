<?php

namespace App\Http\Middleware;

use App\Models\Token;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (session()->has('token')){
            $tokentb = Token::where('token',session('token'))->get();
            if (!isset($tokentb[0])) {
                return redirect('status?denyAccess');
            }
        }else {
            return redirect('status?denyAccess');
        }

        $user = Token::where('token',session('token'))->join('users','tokens.user_id','users.id')->get();

        $userInfo = Token::where('token',session('token'))->join('users','tokens.user_id','users.id');
        if (!isset($user[0]['character_type'])) {
            return redirect('status?denyAccess');
        }
        if ($user[0]['character_type'] == "real_ir") {
            $userInfo = $userInfo->join('real_irs','users.id','real_irs.user_id');
        }
        if($user[0]['character_type'] == "real_foreign"){
            $userInfo = $userInfo->join('real_foreigns','users.id','real_foreigns.user_id');
        }
        if($user[0]['character_type'] == "commercial_law"){
            $userInfo = $userInfo->join('legals_commercials','users.id','legals_commercials.user_id');
        }
        if($user[0]['character_type'] == "legals_non_com"){
            $userInfo = $userInfo->join('legals_non_coms','users.id','legals_non_coms.user_id');
        }
        if($user[0]['character_type'] == "governmental"){
            $userInfo = $userInfo->join('govs','users.id','govs.user_id');
        }
        $userInfo= $userInfo->get();

        session()->put('userInfo',$userInfo);

        return $next($request);
    }
}
