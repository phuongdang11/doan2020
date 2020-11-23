<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;

class RegisterController extends Controller
{
    //
    function index(){
        $d=array('title'=>'Đăng ký');
        return view("services.register", $d);
    }
    function create(Request $r){

        $created = new khachhang([ 
            'Ten_KH' => $r->get('Ten_KH'),
            'email' => $r->get('email'),
            'DienThoai' => $r->get('DienThoai'),
            'password' => $r->get('password'),
            'DiaChi' => $r->get('DiaChi'),
            'Gioi_Tinh' => $r->get('Gioi_Tinh'),
            'Quan'=> $r->get('Quan'),
            'Phuong' => $r->get('Phuong'),
        ]);

        $created->save();
        return redirect('/dang-nhap')->with('mssg', 'Account');
        
    }
}
