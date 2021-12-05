<?php

namespace App\Http\Middleware;

use App\Models\AccessLevel as ModelsAccessLevel;
use App\Models\MainMenu;
use App\Models\UnderMenu;
use Closure;
use Illuminate\Http\Request;

class AccessLevel
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

        $menu = MainMenu::where('link',$_SERVER['REQUEST_URI'])->get();
        $under_menus = UnderMenu::where('link',$_SERVER['REQUEST_URI'])->get();


        if($menu->contains('link','/terminal')){
            
        }

        dd($_SERVER['REQUEST_URI']);
        // if ( ) {
        //     # code...
        // }
        // dd($ModelsAccessLevel);
        return $next($request);
    }
}
