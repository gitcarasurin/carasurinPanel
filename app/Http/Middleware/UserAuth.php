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
        $userInfo = Token::where('token',session('token'))->join('users','tokens.user_id','users.id')->get();
        session()->put('userInfo',$userInfo);
        return $next($request);
    }
}
