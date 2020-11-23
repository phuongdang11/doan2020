<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KhachHang;

class DangnhapController extends Controller
{
    //
    function index(){
        $d=array('title'=>'Đăng nhập');
        return view('services.login', $d);
    }

    
    function login(Request $r)
    {
        $khachhang = khachhang::where(['email' => $r->email])->first();
        if(!$khachhang || !($r->password == $khachhang->password)){
            session()->put('msg', 'Vui Lòng Nhập Lại Email Hoặc Mật Khẩu');
            return redirect('/dang-nhap');
        }
        else{
            $r->session()->put('khachhang', $khachhang);
            return redirect()->back();
        }
    }
    

}
