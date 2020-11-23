<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Khachhang;
use Cache;
use Illuminate\Http\Request;

class LastUserActivity
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
        if ($request->session()->has('khachhang')) {
            Cache::put('user-is-online-' . $request->session()->get('khachhang')['Id_KH'], true);
        }
        return $next($request);
    }
}
