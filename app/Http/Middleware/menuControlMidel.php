<?php

namespace App\Http\Middleware;

use App\Models\MainMenu;
use App\Models\UnderMenu;
use Closure;
use Illuminate\Http\Request;

class menuControlMidel
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

        $menu = MainMenu::get();
        $under_menus = UnderMenu::get();
        session()->put('menu',$menu);
        session()->put('under_menus',$under_menus);
        return $next($request);
    }
}
