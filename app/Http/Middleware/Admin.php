<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle($request, Closure $next)
    {
        if (Auth::check()==true){
            if(auth()->user()->utype !='admin'){
                return redirect('/');
            }
        }else{
            return redirect('/');
        }

        return $next($request);
    }
}
