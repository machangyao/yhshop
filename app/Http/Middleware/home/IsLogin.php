<?php

namespace App\Http\Middleware\home;

use Closure;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('user_info')){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
