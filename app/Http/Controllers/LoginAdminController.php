<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
class LoginAdminController extends Controller
{
    function index(){
        $d=array('title'=>'Đăng Nhập');
        return view("admin.loginad", $d);
    }

    function loginad(Request $r)
    {
        $nhanvien = nhanvien::where(['email' => $r->email])->first();
        if(!$nhanvien || !($r->password == $nhanvien->password)){
            return "ádjasdjasjdklasjkdla";
        }
        else{
            $r->session()->put('nhanvien', $nhanvien);
            return redirect('/qt');
        }
    }
}
