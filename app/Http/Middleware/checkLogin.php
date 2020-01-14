<?php

namespace App\Http\Middleware;

use Closure;

class checkLogin
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
        $user=session('admin');
        //dd($user);
        if(!$user){
            return redirect('/login/login');
        }
       
       return $next($request);
    }

}
