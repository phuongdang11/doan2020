<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\GioHang;
class ThanhtoanController extends Controller
{
    function index(){
        $d=array('title'=>'Thanh toán');
        return view("services.checkout", $d);
    }
    public function thanhtoan(Request $request, $id){
        $cart = giohang::select('Id_GH', 'Id_Kh', 'Ten_SP', 'So_Luong')
        ->where('Id_KH', '=', $id)->get();
        foreach ($cart as $key => $c) {
            $hd = new hoadon([
                'Ten_SP' => $c->Ten_SP,
                'So_Luong' => $c->So_Luong,
                'Ngay_Dang' => $request->get('Ngay_Dang'),
                'Tong_Tien' => $request->get('Tong_Tien'),
                'DiaChi' => $request->get('DiaChi'),
                'DienThoai' => $request->get('DienThoai'),
                'Quan' => $request->get('Quan'),
                'Phuong' => $request->get('Phuong'),
                'Ten_KH' => $request->get('Ten_KH'),
                'AnHien' => $request->get('AnHien'),
                'PT_TT' => $request->get('PT_TT'),
                'ThuTu' => $request->get('ThuTu'),
                'Id_KH' => $request->get('Id_KH'),
            ]);
            $hd->save();
            $dcart = giohang::where('Id_GH', '=', $c->Id_GH);
            $dcart->delete();
        }
        return redirect('/');
    }
}
