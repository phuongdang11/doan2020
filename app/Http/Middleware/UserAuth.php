<?php

namespace App\Http\Middleware;

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
        if($request->path() == "dang-nhap" && $request->session()->has('khachhang'))
        {
            return redirect('/');
        }
        if($request->path() == "loginad" && $request->session()->has('nhanvien'))
        {
            return redirect('/qt');
        }
        if($request->path() == "thanh-toan" && !$request->session()->has('khachhang'))
        {
            return redirect('/dang-nhap');
        }
        if($request->path() == "qt" && !$request->session()->has('nhanvien'))
        {
            return redirect('/loginad');
        }
        return $next($request);
    }
}
