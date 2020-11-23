<?php

namespace App\Http\Middleware;

use Closure;


class checkAdmin
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
        if(auth()->user()->Active == 1){
            return $next($request);
        }  
        return redirect('/')->with('loi', 'Bạn không có quyền admin');
    }
}
