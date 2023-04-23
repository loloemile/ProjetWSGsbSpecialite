<?php

namespace App\Http\Middleware;
use App\Http\Middleware\Connect as Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Closure;

class connect
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request,  $next)
    {
        if (Session::get('id')==0){
            return \redirect('/home');
        }
        return $next($request);
    }
}
