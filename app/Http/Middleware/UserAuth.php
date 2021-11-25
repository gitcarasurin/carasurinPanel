<?php

namespace App\Http\Middleware;

use App\Models\Token;
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

        return $next($request);
    }
}
